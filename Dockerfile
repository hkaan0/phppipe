# Base image
FROM php:7.4-apache

# Install PostgreSQL client
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Set working directory
WORKDIR /var/www/html

# Copy PHP files
COPY index.php /var/www/html/

# Expose port 80
EXPOSE 80
