FROM php:8.2-fpm

# Instalar dependências
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Instalar extensões PHP
RUN docker-php-ext-install pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
