FROM php:8.2-fpm-alpine

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

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /root/.jenkins/workspace/Aplikasi

RUN composer install --no-dev --optimize-autoloader --no-interaction

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

RUN chown -R www-data:www-data /root/.jenkins/workspace/Aplikasi \
    && chmod -R 755 /root/.jenkins/workspace/Aplikasi/storage /root/.jenkins/workspace/Aplikasi/bootstrap/cache

COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 9000

CMD ["entrypoint.sh"]
