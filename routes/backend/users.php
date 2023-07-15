<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', 'index')->name('users.index');
                Route::get('/create', 'create')->name('users.create');
                Route::post('/store', 'store')->name('users.store');
                Route::get('/edit/{user}', 'edit')->name('users.edit');
                Route::put('/update/{user}', 'update')->name('users.update');
                Route::delete('/destroy/{user}', 'destroy')->name('users.destroy');
            });
        });

    });

});