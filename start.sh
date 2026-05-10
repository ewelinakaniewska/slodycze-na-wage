#!/bin/bash

/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS AI_PROJECT;"

if [ $? -ne 0 ]; then
    echo "Nie udało się utworzyć bazy danych."
    exit 1
fi

cp .env.example .env

composer install

php artisan storage:link

php artisan migrate:fresh --seed

php artisan key:generate

