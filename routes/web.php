<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['guest'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        // GET ROUTES
        Route::get('/register', 'showRegisterForm')->name('register');
        Route::get('/login', 'showloginForm')->name('login');
        Route::get('/account-recovery', 'showAccountRecoveryForm')->name('account_recovery');
        Route::get('/reset-password', 'showResetPasswordForm')->name('reset_password');

        // POST ROUTES
        Route::post('/register', 'userRegister');
        Route::post('/login', 'userlogin');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.home');
    });
    Route::post('/logout', [UserController::class, 'userLogout'])->name('logout');
});
