#!/usr/bin/env bash

# paudctl.sh - Script pengelola website TK/PAUD Azzahra di VPS

# Ensure script is run as root
if [ "$EUID" -ne 0 ]; then
    echo -e "\e[31m[ERROR] Script ini harus dijalankan sebagai root! Gunakan: sudo ./paudctl.sh\e[0m"
    exit 1
fi

# Change directory to the script folder
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd "$SCRIPT_DIR" || exit 1

# Formatting colors
RED='\e[31m'
GREEN='\e[32m'
YELLOW='\e[33m'
BLUE='\e[34m'
CYAN='\e[36m'
WHITE='\e[37m'
BOLD='\e[1m'
NC='\e[0m' # No Color

print_info() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

print_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

# Auto-detect PHP-FPM service
php_service="php8.3-fpm"
if command -v systemctl >/dev/null 2>&1; then
    if systemctl list-units --type=service | grep -q "php.*-fpm"; then
        php_service=$(systemctl list-units --type=service | grep -o "php.*-fpm" | head -n 1)
    fi
fi

check_service() {
    local service=$1
    if command -v systemctl >/dev/null 2>&1; then
        if systemctl is-active "$service" >/dev/null 2>&1; then
            echo -e "  ${GREEN}●${NC} $service: ${GREEN}Active (Running)${NC}"
        else
            echo -e "  ${RED}●${NC} $service: ${RED}Inactive (Stopped)${NC}"
        fi
    else
        echo -e "  ${YELLOW}●${NC} $service: ${YELLOW}Systemctl tidak tersedia (Local/Non-systemd)${NC}"
    fi
}

show_status() {
    echo -e "${BOLD}${BLUE}==================================================${NC}"
    echo -e "${BOLD}${BLUE}          STATUS WEBSITE & LAYANAN (VPS)          ${NC}"
    echo -e "${BOLD}${BLUE}==================================================${NC}"
    
    echo -e "${BOLD}${WHITE}[1] Layanan Sistem:${NC}"
    check_service "nginx"
    check_service "$php_service"
    check_service "ufw"
    
    echo
    echo -e "${BOLD}${WHITE}[2] Status Laravel:${NC}"
    if [ -f ".env" ]; then
        APP_ENV=$(grep "^APP_ENV=" .env | cut -d'=' -f2)
        APP_DEBUG=$(grep "^APP_DEBUG=" .env | cut -d'=' -f2)
        echo -e "  Environment:  ${CYAN}$APP_ENV${NC}"
        echo -e "  Debug Mode:   ${CYAN}$APP_DEBUG${NC}"
    else
        echo -e "  .env file:    ${RED}Tidak Ditemukan!${NC}"
    fi
    
    if [ -f "bootstrap/cache/config.php" ]; then
        echo -e "  Config Cache: ${GREEN}Cached${NC}"
    else
        echo -e "  Config Cache: ${YELLOW}Not Cached${NC}"
    fi
    
    if [ -f "bootstrap/cache/routes-v7.php" ] || [ -d "bootstrap/cache/routes" ]; then
        echo -e "  Route Cache:  ${GREEN}Cached${NC}"
    else
        echo -e "  Route Cache:  ${YELLOW}Not Cached${NC}"
    fi

    if [ -f "database/database.sqlite" ]; then
        DB_SIZE=$(du -sh database/database.sqlite | cut -f1)
        echo -e "  DB Size:      ${CYAN}$DB_SIZE${NC}"
    else
        echo -e "  DB SQLite:    ${RED}Tidak ditemukan database.sqlite!${NC}"
    fi
    
    echo
    echo -e "${BOLD}${WHITE}[3] Statistik Pendaftaran:${NC}"
    if [ -f "database/database.sqlite" ]; then
        STATS=$(php artisan tinker --execute='
            try {
                echo App\Models\Registration::count() . "|" . 
                     App\Models\Registration::where("status", "pending")->count() . "|" . 
                     App\Models\Registration::where("status", "verified")->count() . "|" . 
                     App\Models\Registration::where("status", "accepted")->count() . "|" . 
                     App\Models\Registration::where("status", "rejected")->count();
            } catch (\Exception $e) {
                echo "ERROR";
            }
        ' 2>/dev/null)
        
        if [ "$STATS" = "ERROR" ] || [ -z "$STATS" ]; then
            echo -e "  ${RED}Gagal mengambil statistik database (mungkin tabel belum dimigrasi).${NC}"
        else
            IFS='|' read -r total pending verified accepted rejected <<< "$STATS"
            echo -e "  Total Pendaftar: ${BOLD}${WHITE}$total${NC}"
            echo -e "  Menunggu:        ${YELLOW}$pending${NC}"
            echo -e "  Terverifikasi:   ${CYAN}$verified${NC}"
            echo -e "  Diterima:        ${GREEN}$accepted${NC}"
            echo -e "  Ditolak:         ${RED}$rejected${NC}"
        fi
    else
        echo -e "  ${RED}Database tidak tersedia.${NC}"
    fi
    
    echo -e "${BOLD}${BLUE}==================================================${NC}"
}

update_website() {
    print_info "Memulai pembaruan website dari repository GitHub..."
    
    # 1. Git pull
    local branch
    branch=$(git branch --show-current 2>/dev/null || echo "main")
    print_info "Mengambil perubahan terbaru dari branch [${CYAN}$branch${NC}]..."
    
    if git pull origin "$branch"; then
        print_success "Git pull berhasil!"
    else
        print_error "Git pull gagal! Pastikan koneksi internet atau konfigurasi Git benar."
        return 1
    fi
    
    # 2. Composer dependencies
    print_info "Menginstall dependencies Composer (production)..."
    export COMPOSER_ALLOW_SUPERUSER=1
    # Hapus lock file karena dibuat di Windows, bisa tidak kompatibel dengan Linux
    if [ -f "composer.lock" ]; then
        rm -f composer.lock
    fi
    
    if composer install --no-dev --optimize-autoloader --no-interaction; then
        print_success "Composer dependencies berhasil di-install!"
    else
        print_error "Composer install gagal!"
        return 1
    fi
    
    # 3. Database migrations
    print_info "Menjalankan migrasi database..."
    if php artisan migrate --force; then
        print_success "Migrasi database selesai!"
    else
        print_error "Migrasi database gagal!"
        return 1
    fi
    
    # 4. Clear and rebuild cache
    print_info "Membangun ulang cache Laravel..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    print_success "Cache Laravel berhasil diperbarui!"
    
    # 5. Fix permissions
    print_info "Mengatur kepemilikan dan hak akses file..."
    chown -R www-data:www-data . 2>/dev/null || true
    chmod -R 775 storage bootstrap/cache 2>/dev/null || true
    chmod 664 database/database.sqlite 2>/dev/null || true
    print_success "Hak akses file berhasil dikonfigurasi!"
    
    print_success "Pembaruan website selesai diterapkan dengan sukses! 🎉"
}

create_admin() {
    echo -e "${BOLD}${BLUE}=== MEMBUAT USER ADMIN BARU ===${NC}"
    read -p "Masukkan Nama Lengkap: " name
    read -p "Masukkan Email/Username: " email
    
    # Validasi email sederhana
    if [[ ! "$email" =~ ^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$ ]]; then
        print_error "Format email tidak valid!"
        return 1
    fi
    
    # Input password securely
    read -sp "Masukkan Password (min 6 karakter): " password
    echo
    read -sp "Ulangi Password: " password_confirm
    echo
    
    if [ "$password" != "$password_confirm" ]; then
        print_error "Password tidak cocok!"
        return 1
    fi
    
    if [ ${#password} -lt 6 ]; then
        print_error "Password minimal harus 6 karakter!"
        return 1
    fi
    
    print_info "Membuat user di database..."
    if php artisan admin:create "$name" "$email" "$password"; then
        print_success "User admin baru berhasil dibuat!"
    else
        print_error "Gagal membuat user admin baru!"
        return 1
    fi
}

show_help() {
    echo "Penggunaan: sudo ./paudctl.sh [opsi]"
    echo
    echo "Opsi:"
    echo "  update        Update website dari Git repo, install dependencies, migrasi & cache"
    echo "  create-admin  Buat user admin baru secara interaktif di database"
    echo "  status        Tampilkan status layanan VPS (Nginx, PHP, UFW) dan statistik website"
    echo "  help          Tampilkan bantuan ini"
    echo
    echo "Jika dijalankan tanpa opsi, akan menampilkan menu interaktif."
}

# Parse command line arguments
case "$1" in
    update)
        update_website
        exit $?
        ;;
    create-admin)
        create_admin
        exit $?
        ;;
    status)
        show_status
        exit $?
        ;;
    help|--help|-h)
        show_help
        exit 0
        ;;
    "")
        # Interactive mode
        while true; do
            echo
            echo -e "${BOLD}${BLUE}--------------------------------------------------${NC}"
            echo -e "${BOLD}${BLUE}          PANEL PENGELOLA TK/PAUD AZZAHRA         ${NC}"
            echo -e "${BOLD}${BLUE}--------------------------------------------------${NC}"
            echo -e " 1. Update Website dari GitHub"
            echo -e " 2. Buat User Admin Baru"
            echo -e " 3. Cek Status Website & Service"
            echo -e " 4. Keluar"
            echo -e "${BOLD}${BLUE}--------------------------------------------------${NC}"
            read -p "Pilih opsi [1-4]: " pilihan
            echo
            
            case "$pilihan" in
                1)
                    update_website
                    ;;
                2)
                    create_admin
                    ;;
                3)
                    show_status
                    ;;
                4)
                    print_info "Keluar dari panel pengelola."
                    exit 0
                    ;;
                *)
                    print_warning "Pilihan tidak valid. Silakan pilih 1-4."
                    ;;
            esac
        done
        ;;
    *)
        print_error "Opsi tidak dikenal: $1"
        show_help
        exit 1
        ;;
esac
