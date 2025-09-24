<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TechSyncController;

Route::post('/tech/sync', [TechSyncController::class, 'sync']);
