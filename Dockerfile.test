# separate project build with production to save space
FROM composer:2 AS build
# WORKDIR /app
COPY . /app
# don't install dev-dependencies
RUN composer install --no-dev

# production image

FROM php:8-fpm

# set working directory
# WORKDIR /var/www

# install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    # libpng-dev \
    # libjpeg62-turbo-dev \
    # libfreetype6-dev \
    # locales \
    # zip \
    # jpegoptim optipng pngquant gifsicle \
    # vim \
    # unzip \
    # git \
    # curl \
    # libzip-dev \
    libxml2-dev \
    libonig-dev

# clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# install php extensions
RUN docker-php-ext-install bcmath ctype fileinfo \
    # json \
    mbstring \
    # openssl \ # installed by default
    pdo_mysql tokenizer xml

# add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# copy existing application directory contents
# COPY . /var/www
# COPY --from=build /app /var/www

# copy existing application directory permissions
COPY --chown=www:www --from=build /app /var/www

# change user to www
# USER www

# expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
