#!/usr/bin/env bash
set -euo pipefail
cd backend

echo "Copying API routes/controller/model/migration stubs..."
mkdir -p app/Http/Controllers/API app/Models database/migrations
cp ../backend-stubs/routes/api.php routes/api.php
cp ../backend-stubs/app/Http/Controllers/API/LeadController.php app/Http/Controllers/API/LeadController.php
cp ../backend-stubs/app/Models/Lead.php app/Models/Lead.php
cp ../backend-stubs/database/migrations/*.php database/migrations/

echo "Done. Run migrations with: php artisan migrate"
