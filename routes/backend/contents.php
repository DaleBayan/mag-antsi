<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::controller(ContentController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {
            Route::prefix('contents')->group(function () {
                Route::get('/', 'index')->name('contents.index');
                Route::get('/create', 'create')->name('contents.create');
                Route::post('/store', 'store')->name('contents.store');
                Route::get('/show/{content}', 'show')->name('contents.show');
            });
        });

    });

});