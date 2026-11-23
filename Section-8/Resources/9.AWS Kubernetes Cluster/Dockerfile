
FROM php:8.2-apache

# Install MySQL PHP extension
RUN docker-php-ext-install mysqli

# Copy PHP application files
COPY . /var/www/html/

# Apache listens on port 80
EXPOSE 80
