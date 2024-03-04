<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagantsiController;

Route::controller(MagantsiController::class)->group(function () {
    Route::get('/', 'index')->name('landing.index');
    Route::post('/filter','filter')->name('landing.filter');

    Route::prefix('culture')->group(function () {
        Route::get('/','culture')->name('culture.index');
        Route::get('/{type}','cultureType')->name('culture.type');
        Route::get('/change/{slug}','changeType')->name('change.culture');
       
    });
});