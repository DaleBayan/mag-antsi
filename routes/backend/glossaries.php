<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlossaryController;

Route::controller(GlossaryController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {
            Route::prefix('glossaries')->group(function () {
                Route::get('/', 'index')->name('glossaries.index');
                Route::get('/create', 'create')->name('glossaries.create');
                Route::post('/store', 'store')->name('glossaries.store');
                Route::get('/edit/{glossary}', 'edit')->name('glossaries.edit');
                Route::put('/update/{glossary}', 'update')->name('glossaries.update');
                Route::get('/show/{glossary}', 'show')->name('glossaries.show');
            });
        });

    });

});