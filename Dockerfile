FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN cp .env.example .env
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN php artisan key:generate --force

EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080