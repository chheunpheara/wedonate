FROM php:8.3-fpm

WORKDIR /var/www/app

COPY . /var/www/app
RUN apt update -y

RUN apt install zlib1g-dev libjpeg-dev libpng-dev libfreetype6-dev libpng-dev libzip-dev git zip unzip vim libicu-dev -y
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install mysqli gd zip intl pdo_mysql exif
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN composer dump-autoload
RUN php artisan key:generate
RUN composer require livewire/livewire
EXPOSE 9000