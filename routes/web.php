<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

// ===== PUBLIC ROUTES =====
Route::get('/', [RegistrationController::class, 'index'])->name('home');
Route::post('/pendaftaran', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/pendaftaran/sukses/{registrationNumber}', [RegistrationController::class, 'success'])->name('registration.success');

// ===== ADMIN ROUTES =====
Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware(AdminAuth::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/pendaftaran/{registration}', [AdminController::class, 'show'])->name('show');
    Route::patch('/pendaftaran/{registration}/status', [AdminController::class, 'updateStatus'])->name('updateStatus');
    Route::delete('/pendaftaran/{registration}', [AdminController::class, 'destroy'])->name('destroy');
});
