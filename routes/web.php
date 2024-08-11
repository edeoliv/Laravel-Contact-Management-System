<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', function () {
    return view('user.login');
});

Route::get('/account-recovery', function () {
    return view('user.account_recovery');
});

Route::get('/reset-password', function () {
    return view('user.reset_password');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
