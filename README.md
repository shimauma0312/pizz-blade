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
