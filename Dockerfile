# separate project build with production to save space
FROM composer:2 AS build
WORKDIR /app
COPY . /app
# don't install dev-dependencies
RUN composer install --no-dev

# production image
FROM php:8-apache

LABEL org.opencontainers.image.authors="Afiq Nazrie Rabbani <afnazrie@gmail.com>"

EXPOSE 80
# copy project directory from build
COPY --from=build /app /app
# virtual host config
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
# change owner of /app directory
RUN chown -R www-data:www-data /app
# enable apache2 mod_rewrite
RUN a2enmod rewrite
