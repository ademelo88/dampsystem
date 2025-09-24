<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Quotes\Builder as QuoteBuilder;

Route::get('/admin/quotes/builder/{lead}', QuoteBuilder::class)->name('quotes.builder');
