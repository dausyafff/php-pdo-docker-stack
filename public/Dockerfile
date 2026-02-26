FROM php:8.2-apache

# Install extension PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite untuk .htaccess
RUN a2enmod rewrite

# Restart Apache
RUN service apache2 restart