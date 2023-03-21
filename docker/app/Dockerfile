FROM php:8.2-fpm-alpine

RUN apk update \
    && apk add supervisor libzip-dev~=1 zip~=3 libpng-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql zip gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && chmod +x /usr/bin/composer

WORKDIR /var/www/html

COPY . .
COPY docker/app/entrypoint.sh /opt/entrypoint.sh
COPY docker/app/conf/php-fpm.conf /etc/php-fpm.conf
COPY docker/app/conf/php-app.ini /usr/local/etc/php/conf.d/app.ini
COPY docker/app/conf/supervisord.conf /etc/supervisord.conf
COPY docker/app/conf/queue.conf /etc/supervisord.d/queue.conf

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer i --optimize-autoloader --no-interaction --no-dev --no-ansi --no-plugins

VOLUME ["/var/www/html"]

ENTRYPOINT ["/bin/sh", "/opt/entrypoint.sh"]
