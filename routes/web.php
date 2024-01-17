<?php

use App\Http\Controllers\PayslipController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/pin', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/print', [PayslipController::class, 'show']);

    Route::get('/generate-pdf', [PdfController::class, 'generatePdf']);
});

require __DIR__.'/auth.php';
