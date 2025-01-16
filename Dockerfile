# Menggunakan PHP 8.2 dengan FPM dan Alpine sebagai image dasar
FROM php:8.2-fpm-alpine

# Menginstall dependensi sistem yang diperlukan
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

# Menginstall Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Menyiapkan direktori kerja
WORKDIR /var/www

# Menyalin file Composer terlebih dahulu untuk meng-cache dependensi (mengoptimalkan build layer)
COPY composer.json composer.lock /var/www/

# Menjalankan Composer untuk menginstall dependensi aplikasi
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Menyalin seluruh file aplikasi Laravel ke dalam container
COPY . /var/www

# Menyimpan file konfigurasi PHP
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Memberikan hak akses yang sesuai pada direktori penyimpanan
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Menyalin entrypoint dan memberikan hak akses eksekusi
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Membuat .env dari .env.example dan menjalankan artisan key:generate
RUN cp /var/www/.env.example /var/www/.env && php artisan key:generate

# Expose port untuk aplikasi
EXPOSE 9000

# Mengatur entrypoint default untuk menjalankan PHP-FPM
CMD ["entrypoint.sh"]
