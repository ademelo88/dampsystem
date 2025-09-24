<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\API\QuoteController;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/quotes/{id}', [QuoteController::class, 'show']);
    Route::post('/quotes', [QuoteController::class, 'store']);
    Route::post('/leads', [LeadController::class, 'store'])->withoutMiddleware('auth:sanctum');
});
