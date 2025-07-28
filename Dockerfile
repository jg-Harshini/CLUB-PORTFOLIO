FROM php:8.2-fpm

# 1. System dependencies and PHP extensions
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
        tokenizer \
        xml \
        zip

# 2. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Set working directory
WORKDIR /var/www/html

# 4. Copy project files
COPY . .

# 5. Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# 6. Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Expose port (optional)
EXPOSE 9000

# 8. Start PHP-FPM
CMD ["php-fpm"]
