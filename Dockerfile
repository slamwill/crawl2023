FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Redis extension
RUN pecl install redis \
    && docker-php-ext-enable redis

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir laravel
# Set working directory
WORKDIR /var/www/laravel
# WORKDIR /var/www

# Prevent Composer from running as root/super user
ENV COMPOSER_ALLOW_SUPERUSER=1

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
