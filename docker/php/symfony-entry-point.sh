#!/bin/sh

set -e 

# If dependencies are missing, install them
if [[ ! -f /app/vendor/autoload.php && -f /app/composer.json ]]; then
  composer install --no-interaction --optimize-autoloader
fi

# Do Symfony migrations
if [[ -f /app/bin/console && $(find /app/migrations -type f | wc -l) -gt 0 ]]; then
    php bin/console doctrine:migrations:migrate -n
fi

exec "$@"