FROM php:7-fpm

COPY docker/php-fpm/conf/40-custom.ini /usr/local/etc/php/conf.d/40-custom.ini

RUN ls -lah /usr/local/bin/

RUN set -e \
    && apt-get update \
    && apt-get install -my wget \
        zlib1g-dev \
        libicu-dev \
        g++ \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        opcache \
        intl

RUN set -e \
    && pecl install redis-3.1.2 \
    && docker-php-ext-enable redis

RUN set -e \
    && pecl install xdebug-2.4.0 \
    && docker-php-ext-enable xdebug

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer
