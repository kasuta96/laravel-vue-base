#!/usr/bin/env bash

# Laravel
composer install
php artisan key:generate --force
php artisan storage:link
php artisan migrate --force --no-interaction
php artisan db:seed --force --no-interaction
php artisan optimize:clear
php artisan cache:clear
php artisan config:cache

# supervisord
supervisord -c /etc/supervisord.conf
supervisorctl update

# Front-end
npm install
npm run build

# Run app
php-fpm -F
