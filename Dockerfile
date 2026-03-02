FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html/

# Aktifkan mod_rewrite (penting untuk .htaccess)
RUN a2enmod rewrite

# Ubah document root ke folder public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf