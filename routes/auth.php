<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PayslipController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {


    Route::get('/', [LoginController::class, 'index'])->name('loginEmployeeNumber.index');
    Route::post('/', [LoginController::class, 'index'])->name('loginEmployeeNumber');


    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.show');

});

Route::middleware('auth')->group(function () {

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::resource('payslip', PayslipController::class);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
