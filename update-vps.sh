#!/usr/bin/env bash

# update-vps.sh - Script khusus untuk memperbarui website dari GitHub ke VPS
# dan menerapkan perubahan kredensial default admin baru.

# Pastikan script dijalankan sebagai root (super-user)
if [ "$EUID" -ne 0 ]; then
    echo -e "\e[31m[ERROR] Script ini harus dijalankan sebagai root! Gunakan: sudo ./update-vps.sh\e[0m"
    exit 1
fi

# Tentukan direktori kerja script
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd "$SCRIPT_DIR" || exit 1

# Definisi Warna Output Terminal
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

echo -e "${BOLD}${BLUE}=====================================================${NC}"
echo -e "${BOLD}${BLUE}      SCRIPT UPDATE VPS & PENERAPAN KREDENSIAL       ${NC}"
echo -e "${BOLD}${BLUE}=====================================================${NC}"

# 1. Konfigurasi Git Safe Directory
git config --global --add safe.directory "$SCRIPT_DIR" 2>/dev/null || true

# 2. Ambil Kode Terbaru dari GitHub
branch=$(git branch --show-current 2>/dev/null || echo "main")
print_info "Menarik pembaruan kode terbaru dari branch [${CYAN}$branch${NC}]..."

if git fetch --all; then
    print_success "Koneksi ke Git repository berhasil."
else
    print_error "Git fetch gagal! Silakan periksa koneksi internet atau SSH Key di VPS."
    exit 1
fi

if git reset --hard origin/"$branch"; then
    print_success "Repository lokal VPS berhasil diperbarui (reset hard ke origin/$branch)."
else
    print_error "Gagal menyelaraskan kode dengan repositori GitHub!"
    exit 1
fi

# 3. Sinkronisasi Kredensial Baru ke .env
print_info "Memeriksa konfigurasi kredensial admin baru di .env..."
if [ -f ".env" ]; then
    # Jika ADMIN_USERNAME belum ada di .env, tambahkan
    if ! grep -q "^ADMIN_USERNAME=" .env; then
        echo "" >> .env
        echo "ADMIN_USERNAME=admin@paudazzahra.com" >> .env
        print_success "Menambahkan ADMIN_USERNAME ke .env"
    else
        # Jika sudah ada, update nilainya ke email baru
        sed -i 's/^ADMIN_USERNAME=.*/ADMIN_USERNAME=admin@paudazzahra.com/' .env
        print_success "ADMIN_USERNAME diperbarui di .env"
    fi

    # Jika ADMIN_PASSWORD belum ada di .env, tambahkan
    if ! grep -q "^ADMIN_PASSWORD=" .env; then
        echo "ADMIN_PASSWORD=password" >> .env
        print_success "Menambahkan ADMIN_PASSWORD ke .env"
    else
        # Jika sudah ada, update nilainya ke password baru
        sed -i 's/^ADMIN_PASSWORD=.*/ADMIN_PASSWORD=password/' .env
        print_success "ADMIN_PASSWORD diperbarui di .env"
    fi
else
    print_error "File .env tidak ditemukan! Pastikan Anda berada di direktori project Laravel yang benar."
    exit 1
fi

# 4. Install Dependensi Composer
print_info "Menginstall dependensi Composer (mode production)..."
export COMPOSER_ALLOW_SUPERUSER=1
if [ -f "composer.lock" ]; then
    rm -f composer.lock
fi

if composer install --no-dev --optimize-autoloader --no-interaction; then
    print_success "Dependensi Composer berhasil diperbarui!"
else
    print_error "Composer install gagal!"
    exit 1
fi

# 5. Jalankan Migrasi Database
print_info "Menjalankan migrasi database..."
if php artisan migrate --force; then
    print_success "Migrasi database selesai!"
else
    print_error "Migrasi database gagal!"
    exit 1
fi

# 6. Jalankan Seeding untuk Menerapkan User Baru ke Database
print_info "Menerapkan user default baru (admin@paudazzahra.com) ke database..."
if php artisan db:seed --force; then
    print_success "Database seeder berhasil dijalankan! User default telah dibuat/diperbarui."
else
    print_error "Gagal menjalankan database seeder!"
    exit 1
fi

# 7. Bersihkan dan Cache Konfigurasi Baru
print_info "Membersihkan dan merestart cache Laravel..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache
print_success "Cache Laravel berhasil diperbarui."

# 8. Set Hak Akses File agar Sesuai untuk Web Server (Nginx / Apache)
print_info "Menyesuaikan hak akses dan kepemilikan file..."
chown -R www-data:www-data . 2>/dev/null || true
chmod -R 775 storage bootstrap/cache 2>/dev/null || true
if [ -f "database/database.sqlite" ]; then
    chmod 664 database/database.sqlite 2>/dev/null || true
fi
print_success "Hak akses file berhasil diatur."

echo -e "${BOLD}${GREEN}=====================================================${NC}"
echo -e "${BOLD}${GREEN}  PROSES UPDATE VPS SELESAI & KREDENSIAL DIAKTIFKAN! 🎉 ${NC}"
echo -e "${BOLD}${GREEN}=====================================================${NC}"
echo -e "Detail login Admin saat ini:"
echo -e "  - Link Panel: https://[domain-anda]/admin/login"
echo -e "  - Email/Username: ${BOLD}admin@paudazzahra.com${NC}"
echo -e "  - Password: ${BOLD}password${NC}"
echo -e "${BOLD}${GREEN}=====================================================${NC}"
