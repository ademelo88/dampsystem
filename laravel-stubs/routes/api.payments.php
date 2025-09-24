<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StripeController;
use App\Http\Controllers\API\GoCardlessController;

Route::post('/payments/stripe/checkout', [StripeController::class, 'checkout']);
Route::post('/webhooks/stripe', [StripeController::class, 'webhook']);
Route::post('/webhooks/gocardless', [GoCardlessController::class, 'webhook']);
