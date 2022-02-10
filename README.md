# Ecommerce
Ecommerce with Laravel 8 EloquentORM, Vuejs, Quasar and Blade

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

Config with SMTP mail

MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_ENCRYPTION=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=

Config with sendmail

MAIL_MAILER=sendmail
#MAIL_SENDMAIL_PATH="/usr/sbin/sendmail -t -i"
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"

### Set hash
nano hash
Hash1233412312hasd

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

## Permissions

sudo chown -R $USER:www-data storage/*
sudo chmod -R 775 storage/*

sudo chmod 775 database/database.sqlite
sudo chown $USER:www-data database/database.sqlite

sudo mkdir ../messages
sudo chown -R $USER:www-data ../messages/*
sudo chmod -R 775 ../messages/*