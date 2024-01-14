<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/', [LoginController::class, 'index']);

    Route::post('/check_employee_number', [LoginController::class, 'check_employee_number'])->name('check_employee_number');
});

Route::middleware('auth')->group(function () {

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
