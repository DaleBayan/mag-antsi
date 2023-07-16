<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;

Route::controller(TypeController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {
            Route::prefix('content-types')->group(function () {
                Route::get('/', 'index')->name('types.index');
                Route::get('/create', 'create')->name('types.create');
                Route::post('/store', 'store')->name('types.store');
                Route::delete('/destroy/{type}', 'destroy')->name('types.destroy');
            });
        });

    });

});