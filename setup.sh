#!/bin/bash
#
# ============================================================
#  Setup Script — PSB TK/PAUD Azzahra
#  Untuk Ubuntu 24.04 LTS (DigitalOcean VPS)
#  
#  Script ini akan menginstall:
#  - PHP 8.3 + extensions
#  - Composer
#  - Nginx
#  - Certbot (SSL Let's Encrypt)
#  - SQLite
#  - Konfigurasi Laravel
#
#  Penggunaan:
#    chmod +x setup.sh
#    sudo ./setup.sh
# ============================================================

set -e

# ============================================================
# WARNA OUTPUT
# ============================================================
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
PURPLE='\033[0;35m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color
BOLD='\033[1m'

# ============================================================
# FUNCTIONS
# ============================================================
print_header() {
    echo ""
    echo -e "${PURPLE}╔══════════════════════════════════════════════════╗${NC}"
    echo -e "${PURPLE}║${NC}  ${BOLD}${CYAN}PSB TK/PAUD Azzahra — Setup Script${NC}              ${PURPLE}║${NC}"
    echo -e "${PURPLE}║${NC}  ${YELLOW}Ubuntu 24.04 LTS — DigitalOcean VPS${NC}             ${PURPLE}║${NC}"
    echo -e "${PURPLE}╚══════════════════════════════════════════════════╝${NC}"
    echo ""
}

print_step() {
    echo ""
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BOLD}${GREEN}▶ $1${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
}

print_success() {
    echo -e "${GREEN}  ✓ $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}  ⚠ $1${NC}"
}

print_error() {
    echo -e "${RED}  ✗ $1${NC}"
}

print_info() {
    echo -e "${CYAN}  ℹ $1${NC}"
}

# ============================================================
# CEK ROOT
# ============================================================
if [[ $EUID -ne 0 ]]; then
    print_error "Script ini harus dijalankan sebagai root!"
    echo -e "  Gunakan: ${BOLD}sudo ./setup.sh${NC}"
    exit 1
fi

# ============================================================
# HEADER
# ============================================================
print_header

# ============================================================
# INPUT DOMAIN
# ============================================================
echo -e "${BOLD}Konfigurasi Domain${NC}"
echo ""
read -p "  Masukkan domain (contoh: psb.azzahra.sch.id): " DOMAIN

if [[ -z "$DOMAIN" ]]; then
    print_error "Domain tidak boleh kosong!"
    exit 1
fi

read -p "  Masukkan email untuk SSL (contoh: admin@azzahra.sch.id): " SSL_EMAIL

if [[ -z "$SSL_EMAIL" ]]; then
    print_warning "Email kosong, SSL Let's Encrypt mungkin gagal."
    SSL_EMAIL="admin@${DOMAIN}"
fi

# Input admin credentials
echo ""
echo -e "${BOLD}Konfigurasi Admin Panel${NC}"
echo ""
read -p "  Username admin [admin]: " ADMIN_USER
ADMIN_USER=${ADMIN_USER:-admin}

read -sp "  Password admin [azzahra2026]: " ADMIN_PASS
echo ""
ADMIN_PASS=${ADMIN_PASS:-azzahra2026}

echo ""
echo -e "${CYAN}┌─────────────────────────────────────────────────┐${NC}"
echo -e "${CYAN}│${NC}  Domain       : ${BOLD}${DOMAIN}${NC}"
echo -e "${CYAN}│${NC}  Email SSL    : ${BOLD}${SSL_EMAIL}${NC}"
echo -e "${CYAN}│${NC}  Admin User   : ${BOLD}${ADMIN_USER}${NC}"
echo -e "${CYAN}│${NC}  Admin Pass   : ${BOLD}********${NC}"
echo -e "${CYAN}└─────────────────────────────────────────────────┘${NC}"
echo ""
read -p "  Lanjutkan instalasi? (y/n): " CONFIRM

if [[ "$CONFIRM" != "y" && "$CONFIRM" != "Y" ]]; then
    echo "Instalasi dibatalkan."
    exit 0
fi

# ============================================================
# VARIABEL
# ============================================================
APP_DIR="/var/www/psb-azzahra"
APP_USER="www-data"
APP_GROUP="www-data"
PHP_VERSION="8.3"

# ============================================================
# STEP 1: UPDATE SYSTEM
# ============================================================
print_step "Step 1/8 — Update Sistem"

apt update -y && apt upgrade -y
print_success "Sistem berhasil diupdate"

# ============================================================
# STEP 2: INSTALL PHP 8.3
# ============================================================
print_step "Step 2/8 — Install PHP ${PHP_VERSION}"

# Tambahkan repository Ondrej untuk PHP terbaru
apt install -y software-properties-common
add-apt-repository -y ppa:ondrej/php
apt update -y

# Install PHP dan extensions yang dibutuhkan Laravel
apt install -y \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-cli \
    php${PHP_VERSION}-common \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-sqlite3 \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-bcmath \
    php${PHP_VERSION}-tokenizer \
    php${PHP_VERSION}-intl \
    php${PHP_VERSION}-readline

print_success "PHP ${PHP_VERSION} + extensions terinstall"

# Konfigurasi PHP-FPM
PHP_INI="/etc/php/${PHP_VERSION}/fpm/php.ini"
sed -i 's/upload_max_filesize = .*/upload_max_filesize = 10M/' $PHP_INI
sed -i 's/post_max_size = .*/post_max_size = 12M/' $PHP_INI
sed -i 's/max_execution_time = .*/max_execution_time = 120/' $PHP_INI
sed -i 's/memory_limit = .*/memory_limit = 256M/' $PHP_INI

# Restart PHP-FPM
systemctl restart php${PHP_VERSION}-fpm
systemctl enable php${PHP_VERSION}-fpm

print_success "PHP-FPM dikonfigurasi (upload_max=10M, post_max=12M)"

# ============================================================
# STEP 3: INSTALL COMPOSER
# ============================================================
print_step "Step 3/8 — Install Composer"

if ! command -v composer &> /dev/null; then
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    print_success "Composer terinstall"
else
    print_info "Composer sudah terinstall"
fi

composer --version

# ============================================================
# STEP 4: INSTALL NGINX
# ============================================================
print_step "Step 4/8 — Install Nginx"

apt install -y nginx
systemctl start nginx
systemctl enable nginx

print_success "Nginx terinstall dan aktif"

# ============================================================
# STEP 5: INSTALL CERTBOT (SSL)
# ============================================================
print_step "Step 5/8 — Install Certbot (SSL)"

apt install -y certbot python3-certbot-nginx
print_success "Certbot terinstall"

# ============================================================
# STEP 6: SETUP APLIKASI LARAVEL
# ============================================================
print_step "Step 6/8 — Setup Aplikasi Laravel"

# Buat direktori aplikasi
if [[ -d "$APP_DIR" ]]; then
    print_warning "Direktori ${APP_DIR} sudah ada, membuat backup..."
    mv "$APP_DIR" "${APP_DIR}_backup_$(date +%Y%m%d_%H%M%S)"
fi

# Copy files ke server (asumsikan file sudah di-upload / git clone)
# Jika belum ada, buat direktori dulu
mkdir -p "$APP_DIR"

# Cek apakah file sudah ada di current directory
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

if [[ -f "${SCRIPT_DIR}/artisan" ]]; then
    print_info "Menyalin file dari ${SCRIPT_DIR}..."
    cp -r "${SCRIPT_DIR}/." "$APP_DIR/"
else
    print_warning "File Laravel tidak ditemukan di ${SCRIPT_DIR}"
    print_info "Pastikan Anda menjalankan script ini dari root project Laravel"
    print_info "Atau clone repository terlebih dahulu ke ${APP_DIR}"
    
    if [[ ! -f "${APP_DIR}/artisan" ]]; then
        print_error "File artisan tidak ditemukan. Upload file project terlebih dahulu!"
        echo ""
        echo -e "  ${BOLD}Opsi 1:${NC} Upload file project, lalu jalankan ulang script ini"
        echo -e "  ${BOLD}Opsi 2:${NC} Git clone ke ${APP_DIR}, lalu jalankan ulang script ini"
        echo ""
        exit 1
    fi
fi

cd "$APP_DIR"

# Install Composer dependencies (production)
print_info "Menginstall Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Setup environment
cp .env.example .env

# Konfigurasi .env untuk production
sed -i "s|APP_NAME=Laravel|APP_NAME=\"PSB TK/PAUD Azzahra\"|" .env
sed -i "s|APP_ENV=local|APP_ENV=production|" .env
sed -i "s|APP_DEBUG=true|APP_DEBUG=false|" .env
sed -i "s|APP_URL=http://localhost|APP_URL=https://${DOMAIN}|" .env
sed -i "s|APP_LOCALE=en|APP_LOCALE=id|" .env
sed -i "s|APP_FAKER_LOCALE=en_US|APP_FAKER_LOCALE=id_ID|" .env
sed -i "s|ADMIN_USERNAME=admin|ADMIN_USERNAME=${ADMIN_USER}|" .env
sed -i "s|ADMIN_PASSWORD=azzahra2026|ADMIN_PASSWORD=${ADMIN_PASS}|" .env

# Generate application key
php artisan key:generate --force

# Buat SQLite database
touch database/database.sqlite

# Jalankan migrasi
php artisan migrate --force

# Buat storage link
php artisan storage:link

# Cache config, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
chown -R ${APP_USER}:${APP_GROUP} "$APP_DIR"
chmod -R 755 "$APP_DIR"
chmod -R 775 "$APP_DIR/storage"
chmod -R 775 "$APP_DIR/bootstrap/cache"
chmod 664 "$APP_DIR/database/database.sqlite"

print_success "Aplikasi Laravel berhasil dikonfigurasi"
print_success "Database SQLite siap"
print_success "Cache di-optimize untuk production"

# ============================================================
# STEP 7: KONFIGURASI NGINX
# ============================================================
print_step "Step 7/8 — Konfigurasi Nginx"

# Buat konfigurasi Nginx
cat > /etc/nginx/sites-available/psb-azzahra <<NGINX_CONF
server {
    listen 80;
    listen [::]:80;
    server_name ${DOMAIN};
    root ${APP_DIR}/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";
    add_header Referrer-Policy "strict-origin-when-cross-origin";

    index index.php;

    charset utf-8;

    # Upload size
    client_max_body_size 12M;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php${PHP_VERSION}-fpm.sock;
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Cache static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|woff|woff2|ttf|svg|eot)$ {
        expires 30d;
        add_header Cache-Control "public, immutable";
        access_log off;
    }
}
NGINX_CONF

# Aktifkan site
ln -sf /etc/nginx/sites-available/psb-azzahra /etc/nginx/sites-enabled/
rm -f /etc/nginx/sites-enabled/default

# Test konfigurasi Nginx
nginx -t

# Restart Nginx
systemctl restart nginx

print_success "Nginx dikonfigurasi untuk ${DOMAIN}"

# ============================================================
# STEP 8: SETUP SSL (LET'S ENCRYPT)
# ============================================================
print_step "Step 8/8 — Setup SSL (Let's Encrypt)"

print_info "Pastikan DNS domain ${DOMAIN} sudah mengarah ke IP server ini!"
echo ""
read -p "  DNS sudah dikonfigurasi? Lanjutkan setup SSL? (y/n): " SSL_CONFIRM

if [[ "$SSL_CONFIRM" == "y" || "$SSL_CONFIRM" == "Y" ]]; then
    certbot --nginx -d "$DOMAIN" --non-interactive --agree-tos --email "$SSL_EMAIL" --redirect

    if [[ $? -eq 0 ]]; then
        print_success "SSL berhasil diaktifkan!"
        
        # Setup auto-renew
        systemctl enable certbot.timer
        systemctl start certbot.timer
        print_success "Auto-renew SSL aktif"
    else
        print_warning "SSL gagal. Pastikan DNS sudah benar, lalu jalankan:"
        echo -e "  ${BOLD}sudo certbot --nginx -d ${DOMAIN}${NC}"
    fi
else
    print_warning "SSL dilewati. Jalankan manual nanti:"
    echo -e "  ${BOLD}sudo certbot --nginx -d ${DOMAIN}${NC}"
fi

# ============================================================
# SETUP FIREWALL
# ============================================================
print_step "Konfigurasi Firewall (UFW)"

ufw allow OpenSSH
ufw allow 'Nginx Full'
ufw --force enable

print_success "Firewall aktif (SSH + Nginx HTTP/HTTPS)"

# ============================================================
# BUAT SCRIPT MAINTENANCE
# ============================================================
cat > ${APP_DIR}/maintenance.sh <<'MAINT_SCRIPT'
#!/bin/bash
# Script untuk maintenance rutin
# Jalankan: sudo bash /var/www/psb-azzahra/maintenance.sh

echo "=== Maintenance PSB TK/PAUD Azzahra ==="

cd /var/www/psb-azzahra

echo "[1/4] Clearing cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "[2/4] Rebuilding cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "[3/4] Fixing permissions..."
chown -R www-data:www-data /var/www/psb-azzahra
chmod -R 755 /var/www/psb-azzahra
chmod -R 775 /var/www/psb-azzahra/storage
chmod -R 775 /var/www/psb-azzahra/bootstrap/cache
chmod 664 /var/www/psb-azzahra/database/database.sqlite

echo "[4/4] Restarting services..."
systemctl restart php8.3-fpm
systemctl restart nginx

echo "=== Maintenance selesai ==="
MAINT_SCRIPT

chmod +x ${APP_DIR}/maintenance.sh
print_success "Script maintenance dibuat: ${APP_DIR}/maintenance.sh"

# ============================================================
# BUAT SCRIPT BACKUP DATABASE
# ============================================================
mkdir -p ${APP_DIR}/backups

cat > ${APP_DIR}/backup.sh <<'BACKUP_SCRIPT'
#!/bin/bash
# Script backup database SQLite
# Jalankan: sudo bash /var/www/psb-azzahra/backup.sh
# Tambahkan ke crontab: 0 2 * * * /var/www/psb-azzahra/backup.sh

BACKUP_DIR="/var/www/psb-azzahra/backups"
DB_FILE="/var/www/psb-azzahra/database/database.sqlite"
DATE=$(date +%Y%m%d_%H%M%S)

mkdir -p "$BACKUP_DIR"

# Backup database
cp "$DB_FILE" "${BACKUP_DIR}/database_${DATE}.sqlite"

# Hapus backup yang lebih dari 30 hari
find "$BACKUP_DIR" -name "database_*.sqlite" -mtime +30 -delete

echo "Backup selesai: ${BACKUP_DIR}/database_${DATE}.sqlite"
BACKUP_SCRIPT

chmod +x ${APP_DIR}/backup.sh

# Setup cron backup harian jam 2 pagi
(crontab -l 2>/dev/null | grep -v "psb-azzahra/backup.sh"; echo "0 2 * * * ${APP_DIR}/backup.sh") | crontab -

print_success "Script backup & cron harian dibuat"

# ============================================================
# SELESAI
# ============================================================
echo ""
echo ""
echo -e "${GREEN}╔══════════════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║                                                  ║${NC}"
echo -e "${GREEN}║   ${BOLD}✓ INSTALASI SELESAI!${NC}${GREEN}                           ║${NC}"
echo -e "${GREEN}║                                                  ║${NC}"
echo -e "${GREEN}╚══════════════════════════════════════════════════╝${NC}"
echo ""
echo -e "${BOLD}Informasi Akses:${NC}"
echo -e "${CYAN}┌─────────────────────────────────────────────────┐${NC}"
echo -e "${CYAN}│${NC}                                                 ${CYAN}│${NC}"
echo -e "${CYAN}│${NC}  ${BOLD}Website${NC}     : https://${DOMAIN}               "
echo -e "${CYAN}│${NC}  ${BOLD}Admin Panel${NC} : https://${DOMAIN}/admin/login   "
echo -e "${CYAN}│${NC}  ${BOLD}Admin User${NC}  : ${ADMIN_USER}                          "
echo -e "${CYAN}│${NC}  ${BOLD}Admin Pass${NC}  : ********                          "
echo -e "${CYAN}│${NC}                                                 ${CYAN}│${NC}"
echo -e "${CYAN}│${NC}  ${BOLD}App Dir${NC}     : ${APP_DIR}             "
echo -e "${CYAN}│${NC}  ${BOLD}Database${NC}    : ${APP_DIR}/database/database.sqlite"
echo -e "${CYAN}│${NC}  ${BOLD}Uploads${NC}     : ${APP_DIR}/storage/app/public/   "
echo -e "${CYAN}│${NC}                                                 ${CYAN}│${NC}"
echo -e "${CYAN}└─────────────────────────────────────────────────┘${NC}"
echo ""
echo -e "${BOLD}Perintah Berguna:${NC}"
echo -e "  ${YELLOW}sudo bash ${APP_DIR}/maintenance.sh${NC}  — Clear & rebuild cache"
echo -e "  ${YELLOW}sudo bash ${APP_DIR}/backup.sh${NC}       — Backup database"
echo -e "  ${YELLOW}sudo certbot renew --dry-run${NC}         — Test renew SSL"
echo -e "  ${YELLOW}sudo nginx -t && sudo systemctl restart nginx${NC} — Restart Nginx"
echo -e "  ${YELLOW}sudo systemctl restart php${PHP_VERSION}-fpm${NC}          — Restart PHP"
echo ""
echo -e "${PURPLE}Backup database otomatis setiap hari jam 02:00 WIB.${NC}"
echo ""
