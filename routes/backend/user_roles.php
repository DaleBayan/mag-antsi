<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;

Route::controller(UserRoleController::class)->group(function () {

    Route::middleware('auth')->group(function () {

        Route::prefix('dashboard')->group(function () {

            Route::prefix('user-roles')->group(function () {
                Route::get('/', 'index')->name('user_roles.index');
                Route::get('/create', 'create')->name('user_roles.create');
                Route::post('/store', 'store')->name('user_roles.store');
                Route::delete('/destroy/{user_role}', 'destroy')->name('user_roles.destroy');
            });

        });
       
    });

});