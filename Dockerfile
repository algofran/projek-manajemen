# Menggunakan PHP 8.2 dengan FPM dan Alpine sebagai image dasar
FROM php:8.2-fpm-alpine

# Menginstall dependensi sistem
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
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Menginstall Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Menyiapkan direktori kerja
WORKDIR /var/www

# Menyalin file aplikasi
COPY . /var/www

# Menyimpan file konfigurasi PHP
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Menjalankan Composer untuk menginstall dependensi aplikasi
RUN composer install --optimize-autoloader --no-dev

# Memberikan hak akses yang sesuai pada direktori penyimpanan
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Expose port untuk aplika

EXPOSE 9000

# Mengatur entrypoint default
CMD ["php-fpm"]
