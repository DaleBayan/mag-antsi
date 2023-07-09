<?php

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

Route::fallback(function () {
    return view('backend.404');
});