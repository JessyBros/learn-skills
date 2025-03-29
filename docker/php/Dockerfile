FROM php:8.3-fpm

ARG SYMFONY_CLI_VERSION=stable
ARG NODE_VERSION=23

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

WORKDIR /app

RUN curl -1sLf "https://dl.cloudsmith.io/public/symfony/${SYMFONY_CLI_VERSION}/setup.deb.sh" | bash 

RUN apt-get update && apt-get install -y --no-install-recommends \
    postgresql-client \
    libcurl4-gnutls-dev zlib1g-dev libicu-dev g++ libxml2-dev libpq-dev libonig-dev libzip-dev libldb-dev libpng-dev \
    software-properties-common \
    git unzip procps \
    locales \
    wget \
    libxrender1 \
    libc-dev make gcc autoconf libxslt-dev \
    symfony-cli

RUN apt-get autoremove && apt-get autoclean \
    && rm -rf /var/lib/apt/lists/*

# Installation des extensions PHP
RUN docker-php-ext-install \
    intl mbstring  zip bcmath gd xsl \
    pdo  pdo_pgsql

# Installation de Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Nettoyage
RUN apt-get autoremove -y && apt-get autoclean -y && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Installation de Node.js
RUN if [ -n "$NODE_VERSION" ] ; then \
    curl -sL "https://deb.nodesource.com/setup_${NODE_VERSION}.x" | bash - && \
    apt-get update && apt-get install -y --no-install-recommends nodejs && \
    apt-get autoremove -y && apt-get autoclean -y && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*; \
    fi

# Configuration PHP-FPM
RUN echo "access.log = /dev/null" >> /usr/local/etc/php-fpm.d/www.conf

# Copier les fichiers de projet
COPY composer.json composer.lock ./
COPY assets assets
COPY bin bin
COPY config config
COPY public public
COPY src src
COPY templates templates
# COPY tests tests
# COPY translations translations
# COPY  package.json package-lock.json webpack.config.js
COPY .env ./

# Rendre bin/console exécutable
RUN chmod +x bin/console

# Changer le propriétaire des fichiers pour www-data
# RUN chown -R www-data:www-data var/

# Installation des dépendances PHP
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Ensure the symfony-entry-point.sh file exists in the context directory
COPY docker/php/symfony-entry-point.sh /symfony-entry-point.sh
ENTRYPOINT ["/bin/bash", "/symfony-entry-point.sh"]

CMD ["php-fpm"]