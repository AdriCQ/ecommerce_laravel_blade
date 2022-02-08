# Ecommerce
Ecommerce with Laravel 8 EloquentORM and Blade templates

# Installation

## Required Packages
For image handlers requried php-gd

sudo apt-get install php-gd

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

Modify
APP_NAME=
APP_URL=

MAIL_HOST=
MAIL_PORT=
MAIL_ENCRYPTION=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=

### Set hash
nano hash
SetNewHasApp

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
