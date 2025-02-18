FROM php:8.2-fpm as dev

# Installe les dépendances nécessaires pour Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip

# Installe Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD docker/php/symfony-entry-point.sh /

FROM dev AS prod

COPY composer.json \
    composer.lock \
    ./

## Install application dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-scripts

## Copy project files to workdir
COPY bin/console bin/console

# Make sure bin/console is executable
RUN chmod +x bin/console