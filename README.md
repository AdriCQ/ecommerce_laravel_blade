# Ecommerce
Ecommerce with Laravel 8 EloquentORM and Blade templates

# Installation

## Required Packages
For image handlers requried php-gd

sudo apt-get install php7.4-gd

## Php packages
To download PHP packages run

composer install

## Setup
### Create Enviroment config file

cp .env.example .env

### Generate Application Unique token

php artisan key:generate

### Edit .env file with custom configuration

nano .env

### Link storage folder

php artisan storage:link

### Generate sqlite database

cd database
sqlite3
.output database.sqlite
.exit


### Migrate and Seed data

php artisan migrate:fresh --seed

## Nginx custom config

Check nginx.example.config file