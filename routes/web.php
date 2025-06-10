<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/sign-up-page', function () {
    return view('sign-up');
});

Route::get('/log-in-page', function () {
    return view('log-in');
});

Route::get('/forgot-password', function () {
    return view('forgotpass');
});

Route::get('/reset', function () {
    return view('resetpass');
});










