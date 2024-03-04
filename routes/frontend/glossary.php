<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagantisGlossaryController;

Route::controller(MagantisGlossaryController::class)->group(function () {
    Route::prefix('glossary')->group(function () {
        Route::get('/','index')->name('glossary.index');
        Route::post('/filter', 'filter')->name('glossary.filter');
    });
});