#!/usr/bin/env bash
set -euo pipefail
if [ ! -f backend/artisan ]; then
  echo "Laravel not found. Run ./scripts/setup.sh first."
  exit 1
fi
cd backend

echo "Copying app code..."
mkdir -p app/Http/Controllers/API app/Http/Controllers/Portal app/Livewire/IntakeWizard app/Livewire/Portal app/Models app/Notifications app/Policies app/Services/Payments app/Services/Documents app/Services/Procurement
mkdir -p database/migrations database/seeders database/factories
mkdir -p resources/views/livewire/intake resources/views/portal resources/views/pdf
mkdir -p routes
mkdir -p config

cp -r ../laravel-stubs/app/* app/
cp -r ../laravel-stubs/database/migrations/* database/migrations/
cp -r ../laravel-stubs/database/seeders/* database/seeders/ || true
cp -r ../laravel-stubs/database/factories/* database/factories/ || true
cp -r ../laravel-stubs/resources/* resources/
cp -r ../laravel-stubs/routes/* routes/
cp -r ../laravel-stubs/config/* config/ || true

echo "Installing barryvdh/laravel-dompdf for PDF generation..."
composer require barryvdh/laravel-dompdf:^2.0
php artisan vendor:publish --provider="Barryvdh\\DomPDF\\ServiceProvider"

echo "Running migrations & seeders..."
php artisan migrate
php artisan db:seed --class=RoleSeeder

echo "All stubs applied. Next steps:"
echo " - Configure .env for Stripe/GoCardless, MinIO/S3, Mailpit"
echo " - php artisan serve (or use your web server)"
