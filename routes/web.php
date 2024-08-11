<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'userRegister']);
Route::get('/login', [UserController::class, 'showloginForm'])->name('login');
Route::post('/login', [UserController::class, 'userlogin']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.home');
    });
    Route::post('/logout', [UserController::class, 'userLogout'])->name('logout');
});



Route::get('/account-recovery', function () {
    return view('user.account_recovery');
});

Route::get('/reset-password', function () {
    return view('user.reset_password');
});
