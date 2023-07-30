<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttachmentController;

Route::controller(AttachmentController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {
            Route::prefix('attachments')->group(function () {
                Route::get('/{glossary}', 'index')->name('attachments.index');
                Route::post('/store/{glossary}', 'store')->name('attachments.store');
                Route::delete('/destroy/{attachment}', 'destroy')->name('attachments.destroy');
                Route::delete('/destroyAll/{glossary}', 'destroyAll')->name('attachments.destroyAll');
            });
        });

    });

});