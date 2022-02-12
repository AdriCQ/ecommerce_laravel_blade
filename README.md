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

For sendmail

    APP_NAME=yorAppNameHere
    APP_ENV=local  
    APP_DEBUG=false
    APP_URL=putYourDomainHere
    APP_TIMEZONE=UTC

    LOG_CHANNEL=stack
    LOG_LEVEL=debug

    DB_CONNECTION=sqlite

    # Config with sendmail

    MAIL_MAILER=sendmail
    MAIL_FROM_ADDRESS=putYourEmailAddressHere
    MAIL_FROM_NAME="${APP_NAME}"

For SMTP mail

    APP_NAME=yorAppNameHere
    APP_ENV=local  
    APP_DEBUG=false
    APP_URL=putYourDomainHere
    APP_TIMEZONE=UTC

    LOG_CHANNEL=stack
    LOG_LEVEL=debug

    DB_CONNECTION=sqlite

    # Config with SMTP

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.googlemail.com
    MAIL_PORT=587
    MAIL_ENCRYPTION=tls
    MAIL_USERNAME=godjango.automail2@gmail.com
    MAIL_PASSWORD=jlvgmbeycpbjzgkw
    MAIL_FROM_ADDRESS="${MAIL_USERNAME}"
    MAIL_FROM_NAME="${APP_NAME}"


### Set hash message folder name
    nano hash

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

## Extra

To change timezone edit APP_TIMEZONE=UTC on .env. List of available timezones code https://www.php.net/manual/es/timezones.php