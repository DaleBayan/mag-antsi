<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::controller(ContactController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {

            Route::prefix('contacts')->group(function () {
                Route::get('/', 'index')->name('contacts.index');
                Route::get('/create', 'create')->name('contacts.create');
                Route::post('/store', 'store')->name('contacts.store');
                Route::get('/edit/{contact}', 'edit')->name('contacts.edit');
                Route::put('/update/{contact}', 'update')->name('contacts.update');
                Route::delete('/destroy/{contact}', 'destroy')->name('contacts.destroy');
            });

        });
       
    });

});