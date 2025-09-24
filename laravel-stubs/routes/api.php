<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\API\QuoteController;
use App\Http\Controllers\API\UploadController;

Route::post('/leads', [LeadController::class, 'store']);
Route::post('/uploads', [UploadController::class, 'store']); // signed S3 upload
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/quotes/{quote}', [QuoteController::class, 'show']);
    Route::post('/quotes', [QuoteController::class, 'store']);
});
