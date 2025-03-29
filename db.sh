#!/bin/bash

set -e

# Create the database if it doesn't exist
docker-compose exec php php bin/console doctrine:database:create --if-not-exists

# Run the migrations
docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction