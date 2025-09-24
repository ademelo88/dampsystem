<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\PortalController;
use App\Http\Controllers\Portal\QuoteApprovalController;
use App\Http\Controllers\Portal\PaymentController as PortalPaymentController;
use App\Livewire\IntakeWizard\Wizard;

Route::get('/', fn() => view('welcome'));
Route::get('/get-a-quote', Wizard::class)->name('intake.wizard');

Route::prefix('portal')->middleware(['web'])->group(function() {
    Route::get('/', [PortalController::class, 'dashboard'])->name('portal.dashboard');
    Route::get('/quotes/{quote}', [PortalController::class, 'quote'])->name('portal.quote');
    Route::post('/quotes/{quote}/select-option/{option}', [QuoteApprovalController::class, 'selectOption'])->name('portal.quote.select');
    Route::post('/quotes/{quote}/sign', [QuoteApprovalController::class, 'sign'])->name('portal.quote.sign');
    Route::post('/quotes/{quote}/deposit', [PortalPaymentController::class, 'deposit'])->name('portal.quote.deposit');
});
