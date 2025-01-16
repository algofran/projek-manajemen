FROM php:8.2-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    zip \
    unzip \
    libxml2-dev \
    oniguruma-dev \
    libzip-dev \
    bash \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy project files ke dalam container
COPY . /var/www

# Install dependencies via Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction || { \
    echo "Composer install failed!"; exit 1; }

# Salin konfigurasi PHP
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Perbaiki ownership dan permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Salin entrypoint script
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port 9000 untuk PHP-FPM
EXPOSE 9000

CMD ["entrypoint.sh"]
