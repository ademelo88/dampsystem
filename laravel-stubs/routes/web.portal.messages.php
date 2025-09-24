<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\MessageController;

Route::get('/portal/messages', [MessageController::class, 'index'])->name('portal.messages.index');
Route::post('/portal/messages', [MessageController::class, 'store'])->name('portal.messages.store');
