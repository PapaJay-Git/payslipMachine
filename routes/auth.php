<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('loginEmployeeNumber.index');
    Route::post('/', [LoginController::class, 'index'])->name('loginEmployeeNumber');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.show');
});

Route::middleware('auth', 'CheckDefaultPassword')->group(function () {
    Route::resource('payslip', PayslipController::class);

    Route::post('logoutPrint', [AuthenticatedSessionController::class, 'destroyPrint'])->name('logout.print');

    Route::get('/generate-pdf', [PdfController::class, 'generatePdf']);

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/pin', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('logoutPassword', [AuthenticatedSessionController::class, 'destroyPassword'])->name('logout.password');
});

Route::get('/modal', function () {
    return Inertia::render('Modal');
});
