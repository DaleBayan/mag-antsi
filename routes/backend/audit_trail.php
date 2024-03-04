<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditTrailController;
Route::controller(AuditTrailController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {

            Route::prefix('audit')->group(function () {
                Route::get('/', 'index')->name('audit.index');
            });

        });
       
    });

});





?>