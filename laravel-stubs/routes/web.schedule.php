<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/schedule', fn() => view('admin.schedule'))->name('admin.schedule');
