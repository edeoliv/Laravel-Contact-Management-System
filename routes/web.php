<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['guest'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        // GET ROUTES
        Route::get('register', 'showRegisterForm')->name('register');
        Route::get('login', 'showloginForm')->name('login');
        Route::get('forgot-password', 'showForgotPasswordForm')->name('password.request');
        Route::get('reset-password/{token}', 'showResetPasswordForm')->name('password.reset');

        // POST ROUTES
        Route::post('register', 'userRegister');
        Route::post('login', 'userlogin');
        Route::post('forgot-password', 'userForgotPassword');
        Route::post('reset-password', 'userResetPassword')->name('password.update');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.home');
    })->name('dashboard');
    Route::post('/logout', [UserController::class, 'userLogout'])->name('logout');
});
