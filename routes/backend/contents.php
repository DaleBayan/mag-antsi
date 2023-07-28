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
                Route::get('/edit/{content}', 'edit')->name('contents.edit');
                Route::put('/update/{content}', 'update')->name('contents.update');
                Route::delete('/destroy/{content}', 'destroy')->name('contents.destroy');
                Route::get('/show/{content}', 'show')->name('contents.show');
            });
        });

    });

});