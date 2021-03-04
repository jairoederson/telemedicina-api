FROM composer:1.9.3 as build
WORKDIR /app
COPY . /app
RUN apk add --no-cache libpng libpng-dev && docker-php-ext-install gd && apk del libpng-dev
#RUN composer update
RUN composer install

FROM php:7.1.8-apache
RUN docker-php-ext-install pdo_mysql
EXPOSE 80
COPY --from=build /app /app
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /app \
    && a2enmod rewrite