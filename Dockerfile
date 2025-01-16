FROM php:8.2-fpm-alpine

# Install dependencies dan PHP extensions yang dibutuhkan
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

# Tentukan direktori kerja untuk aplikasi Laravel
WORKDIR /var/www

# Salin file php.ini yang sudah disesuaikan
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Salin dan setel permission untuk aplikasi Laravel yang ada di /root/.jenkins/workspace/Aplikasi
# Gunakan path yang sesuai dengan lokasi di Jenkins
RUN chown -R www-data:www-data /root/.jenkins/workspace/Aplikasi \
    && chmod -R 755 /root/.jenkins/workspace/Aplikasi/storage /root/.jenkins/workspace/Aplikasi/bootstrap/cache

# Install dependensi Laravel menggunakan Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --working-dir=/root/.jenkins/workspace/Aplikasi

# Salin entrypoint.sh dan setel executable permission
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port 9000 untuk PHP-FPM
EXPOSE 9000

# Jalankan entrypoint.sh saat container dimulai
CMD ["entrypoint.sh"]
