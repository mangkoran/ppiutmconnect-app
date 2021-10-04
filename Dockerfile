FROM php:7.2-fpm

# copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# set working directory
WORKDIR /var/www

# install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# install php extensions
RUN docker-php-ext-install bcmath ctype fileinfo json mbstring \
    # openssl \ # installed by default
    pdo_mysql tokenizer xml

# install composer
RUN curl \
    --silent \
    --fail \
    --location \
    --retry 3 \
    --output /tmp/installer.php \
    --url https://raw.githubusercontent.com/composer/getcomposer.org/master/web/installer \
    ; \
    # echo 3137ad86bd990524ba1dedc2038309dfa6b63790d3ca52c28afea65dcc2eaead16fb33e9a72fd2a7a8240afaf26e065939a2d472f3b0eeaa575d1e8648f9bf19 /tmp/installer.php | sha512sum --strict --check ; \
# install composer phar binary
    php /tmp/installer.php \
        --no-ansi \
        --install-dir=/usr/local/bin \ # https://unix.stackexchange.com/questions/8656/usr-bin-vs-usr-local-bin-on-linux
        --filename=composer \
        # --version=${COMPOSER_VERSION} \
        ; \
    composer --ansi --version --no-interaction ; \
    composer diagnose ; \
    rm -f /tmp/installer.php ; \
    find /tmp -type d -exec chmod -v 1777 {} +

# add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# copy existing application directory contents
COPY . /var/www

# copy existing application directory permissions
COPY --chown=www:www . /var/www

# change user to www
USER www

# expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
