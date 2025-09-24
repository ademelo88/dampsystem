#!/usr/bin/env bash
set -euo pipefail

# Bootstrap Laravel 11 app into backend/ if not present.
if [ ! -d backend ]; then
  mkdir -p backend
fi

if [ ! -f backend/artisan ]; then
  echo "Installing Laravel 11 in backend/ ..."
  composer create-project laravel/laravel:^11 backend
fi

cd backend

# Packages
composer require livewire/livewire filament/filament spatie/laravel-permission spatie/laravel-medialibrary   league/flysystem-aws-s3-v3 laravel/sanctum laravel/horizon laravel/scout meilisearch/meilisearch-php   stripe/stripe-php

# Publish configs (where needed)
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider" --tag=config

# ENV tweaks
cp -n .env.example .env || true
php artisan key:generate

# Storage link
php artisan storage:link

echo "Done. Configure .env for DB, Redis, S3/MinIO, Mailpit, Stripe, GoCardless."
