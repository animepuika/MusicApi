#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer dump-autoload

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force
