FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    && docker-php-ext-install intl pdo pdo_mysql mysqli zip \
    && a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader --no-scripts --no-interaction

RUN chown -R www-data:www-data /var/www/html/writable

ENV CI_ENVIRONMENT=production

EXPOSE 80

COPY .docker/apache.conf /etc/apache2/sites-available/000-default.conf