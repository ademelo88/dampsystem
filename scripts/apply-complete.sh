#!/usr/bin/env bash
set -euo pipefail
if [ ! -f backend/artisan ]; then
  echo "Laravel not found. Run ./scripts/setup.sh first."
  exit 1
fi
cd backend

echo "Copying COMPLETE stubs into Laravel app..."
rsync -a --ignore-times ../laravel-stubs/ ./

echo "Installing required dev tools and packages..."
composer require barryvdh/laravel-dompdf:^2.0
composer require livewire/livewire filament/filament spatie/laravel-permission spatie/laravel-medialibrary laravel/sanctum laravel/horizon laravel/scout meilisearch/meilisearch-php stripe/stripe-php
composer require --dev laravel/pint:^1 nunomaduro/larastan:^2 phpstan/phpstan:^1

php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider" --force || true
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --force || true
php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider" --tag=config --force || true

echo "Migrating & seeding..."
php artisan migrate
php artisan db:seed --class=RoleSeeder || true
php artisan db:seed --class=LabourRateSeeder || true
php artisan db:seed --class=MaterialsSeeder || true
php artisan db:seed --class=AssembliesSeeder || true

echo "Done. Launch with: php artisan serve"
