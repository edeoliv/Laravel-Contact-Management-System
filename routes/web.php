<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'destroy'])->middleware('auth');

Route::get('/login', function () {
    return view('user.auth.login');
})->name('login');

Route::get('/account-recovery', function () {
    return view('user.account_recovery');
});

Route::get('/reset-password', function () {
    return view('user.reset_password');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
