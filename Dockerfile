FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    nginx \
    supervisor \
    sqlite \
    libzip-dev \
    oniguruma-dev \
    unzip \
    curl \
    git \
    && docker-php-ext-install mbstring zip pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www
WORKDIR /var/www

RUN addgroup -g 1000 -S www && adduser -S www -G www -u 1000

RUN chown -R www:www /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache \
    && cp .env.example .env \
    && composer install --no-dev --optimize-autoloader \
    && php artisan key:generate \
    && php artisan storage:link \
    && chown -R www:www /var/www

COPY docker/supervisord.conf /etc/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
