<?php

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


require __DIR__ . '/direct/auth.php';

Route::fallback(function () {
    return view('404');
});