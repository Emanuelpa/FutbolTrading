FROM php:8.3.11-apache

RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \
    git

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html
COPY .env /var/www/html/.env
COPY ./public/.htaccess /var/www/html/.htaccess

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

WORKDIR /var/www/html

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN mkdir -p /var/www/html/vendor/mpdf/mpdf/tmp \
    && chmod -R 777 /var/www/html/vendor/mpdf/mpdf/tmp

RUN php artisan key:generate
RUN php artisan config:clear && php artisan config:cache

RUN php artisan storage:link
RUN php artisan migrate:fresh

RUN chmod -R 777 storage bootstrap/cache resources/lang

RUN service apache2 restart
