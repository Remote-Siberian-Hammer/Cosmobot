FROM php:8.2-fpm

WORKDIR /var/www/webhook
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug