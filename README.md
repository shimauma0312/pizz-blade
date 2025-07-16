<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/shimauma0312/pizz-blade.git
cd your-repository
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Create environment configuration file

Copy the `.env.example` file to create a new `.env` file.

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure the database

If you are using MySQL, edit the `.env` file to set the database connection information.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

If you are using SQLite, create an empty `database.sqlite` file in the `database` directory and update the `.env` file as follows:

```bash
touch database/database.sqlite
```

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

### 6. Run migrations

```bash
php artisan migrate
```

### 7. Start the development server

Run the following commands to start the development server.

```bash
npm run dev
php artisan serve
```

Access the application at `http://localhost:8000` in your browser to verify it is working.

## Deploying pizz-blade on Ubuntu with Apache2

This guide provides step-by-step instructions to deploy pizz-blade (a Laravel app) on **Ubuntu + Apache2**.  
It covers all the common pitfalls—especially around file permissions and asset building—that you may encounter!

---

### 1. Install Required Packages

```bash
# Update system
sudo apt update

# Install Apache2, PHP, and required extensions
sudo apt install apache2 php php-fpm php-mbstring php-xml php-bcmath php-zip php-curl php-sqlite3 unzip git curl

# Install Node.js and npm (for Vite)
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs
```

---

### 2. Clone the Repository

```bash
git clone https://github.com/shimauma0312/pizz-blade.git /home/ubuntu/dev/pizz-blade
cd /home/ubuntu/dev/pizz-blade
```

---

### 3. Install Composer Dependencies

```bash
curl -sS https://getcomposer.org/installer | php
php composer.phar install
```

---

### 4. Set Up Environment

```bash
cp .env.example .env

# Edit .env as needed (e.g., DB_DATABASE=/home/ubuntu/dev/pizz-blade/database/database.sqlite)
nano .env

# Generate app key
php artisan key:generate
```

---

### 5. Set File Permissions (DO NOT SKIP!)

```bash
# Set proper owner for Apache2 (www-data)
sudo chown -R www-data:www-data /home/ubuntu/dev/pizz-blade/storage
sudo chown -R www-data:www-data /home/ubuntu/dev/pizz-blade/bootstrap/cache

# Make sure storage and cache are writable
sudo chmod -R 775 /home/ubuntu/dev/pizz-blade/storage
sudo chmod -R 775 /home/ubuntu/dev/pizz-blade/bootstrap/cache

# If using SQLite, also fix DB file/dir permissions!
sudo chown -R www-data:www-data /home/ubuntu/dev/pizz-blade/database
sudo chmod -R 775 /home/ubuntu/dev/pizz-blade/database
sudo touch /home/ubuntu/dev/pizz-blade/database/database.sqlite
sudo chown www-data:www-data /home/ubuntu/dev/pizz-blade/database/database.sqlite
sudo chmod 664 /home/ubuntu/dev/pizz-blade/database/database.sqlite
```
**If you see "attempt to write a readonly database" or log permission errors, 99% this is the cause!**

---

### 6. Install Node Modules & Build Frontend Assets

Make sure your `vite` and `laravel-vite-plugin` versions are compatible!  
(For Laravel 11, use the latest compatible versions.)

```bash
npm install
npm run build
```
**If you see `Vite manifest not found` errors, this step failed or wasn't run.**

---

### 7. Configure Apache2

Create a config file like `/etc/apache2/sites-available/pizz-blade.conf`:

```apache
<VirtualHost *:80>
    ServerName your.domain.or.IP

    DocumentRoot /home/ubuntu/dev/pizz-blade/public

    <Directory /home/ubuntu/dev/pizz-blade/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/pizz-blade_error.log
    CustomLog ${APACHE_LOG_DIR}/pizz-blade_access.log combined
</VirtualHost>
```

Enable required modules and your site:

```bash
sudo a2enmod rewrite
sudo a2ensite pizz-blade.conf
sudo systemctl reload apache2
```

---

### 8. Troubleshooting Quick Reference

- **403 Forbidden**  
  → Double-check DocumentRoot, `<Directory>` permissions, and `Require all granted`.

- **attempt to write a readonly database**  
  → DB file/dir permissions wrong. See step 5.

- **laravel.log permission denied**  
  → Storage or logs permissions wrong. See step 5.

- **Vite manifest not found**  
  → You forgot `npm run build` or dependencies failed. See step 6.

- **npm install EACCES errors**  
  → Project files owned by root.  
  ```bash
  sudo chown -R ubuntu:ubuntu /home/ubuntu/dev/pizz-blade
  ```

---

**Deploy like a boss, permission-hell free!**
