FROM php:8.3

# Installs extra libraries
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Installs Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
ARG COMPOSER_VERSION=2.7.2
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin \
    --version=${COMPOSER_VERSION} \
    && composer clear-cache

WORKDIR /home/php-pro