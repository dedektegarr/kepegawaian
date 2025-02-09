# Sistem Kepegawaian Setup

## Prerequisites

-   PHP ^8.2
-   Composer ^2.76
-   MySQL

## Installation Steps

### 1. Clone Repository

```sh
git clone https://github.com/dedektegarr/kepegawaian.git
cd kepegawaian
```

### 2. Install Dependencies

```sh
composer install
```

### 3. Copy Environment File

```sh
cp .env.example .env
```

### 4. Generate Application Key

```sh
php artisan key:generate
```

### 5. Configure Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kepegawaian
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Database Migrations

```sh
php artisan migrate --seed
```

### 7. Run Artisan Server

```sh
php artisan serve
```

## User Account

### Admin

```sh
email: admin@gmail.com
password: password12345
```

### Operator

```sh
email: operator@gmail.com
password: password12345
```
