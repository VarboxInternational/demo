#!/bin/bash

if [ ! -f composer.json ]; then
    echo "Please make sure to run this script from the root directory of this repo."
    exit 1
fi

if [ "$1" ]; then
    git pull origin $1
fi

composer install
composer dump-autoload

php artisan migrate:fresh --seed --force

php artisan cache:clear
php artisan view:clear
