# Requirements
`Php 7.3`
# Installation

```
git clone https://github.com/A-H-Pooladvand/wishato.git
cd wishato
composer install
cp .env.example .env
```
Change your `.env` file and specify your database

```
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

Enjoy.
