# Imagen base con Apache y PHP 8.3
FROM php:8.3.11-apache

RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/public/.htaccess
WORKDIR /var/www/html

RUN a2enmod rewrite
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --prefer-dist
RUN php artisan key:generate
RUN php artisan migrate
RUN chmod -R 777 storage
RUN php artisan storage:link
RUN service apache2 restart
RUN php artisan migrate
EXPOSE 80
