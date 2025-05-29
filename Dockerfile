# Base image with Apache and PHP 8
FROM php:8.2-apache

# Install PostgreSQL extension for PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql

# Copy custom PHP files into container
COPY . /var/www/html
