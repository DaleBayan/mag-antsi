<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePasswordController;


Route::controller(ChangePasswordController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {
            Route::get('/change-password', 'index')->name('change_password.index');
            Route::post('/change-password', 'change_password')->name('change_password');
        });

    });

});