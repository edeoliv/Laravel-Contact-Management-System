<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('account.register');
});

Route::get('/login', function () {
    return view('account.login');
});

Route::get('/account-recovery', function () {
    return view('account.account_recovery');
});

Route::get('/reset-password', function () {
    return view('account.reset_password');
});
