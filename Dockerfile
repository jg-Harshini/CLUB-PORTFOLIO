# Use the official PHP image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# 1. Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    pkg-config \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        gd \
        mbstring \
        xml \
        zip

# 2. Enable Apache Rewrite Module
RUN a2enmod rewrite

# 3. Set Apache to serve Laravel from /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# 4. Update Apache config to reflect public/ root
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# 5. Copy source files
COPY . /var/www/html

# 6. Set correct permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# 7. Install Composer dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --optimize-autoloader --no-dev

# 8. Expose port 80 (Apache default)
EXPOSE 80

# 9. Apache will start automatically (CMD not needed unless overriding)
