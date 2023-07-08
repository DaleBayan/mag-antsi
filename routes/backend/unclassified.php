<?php

Route::get('/dashboard', function () {
    return view('backend.index');
})->name('dashboard')->middleware('auth');

Route::fallback(function () {
    return view('backend.404');
});