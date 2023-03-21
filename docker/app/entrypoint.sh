#!/usr/bin/env bash

# Laravel
composer update
php artisan config:cache
php artisan key:generate --force
php artisan storage:link
php artisan migrate --force --no-interaction
php artisan db:seed --force --no-interaction
php artisan optimize:clear

# supervisord
supervisord -c /etc/supervisord.conf
supervisorctl update
php-fpm -F
