<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TenantMiddleware;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/tenants/{tenant}/approve', [AdminController::class, 'approveTenant'])->name('admin.tenants.approve');
    Route::post('/admin/tenants/{tenant}/reject', [AdminController::class, 'rejectTenant'])->name('admin.tenants.reject');
});

// Tenant routes
Route::middleware([TenantMiddleware::class])->group(function () {
    Route::get('/dashboard', [TenantController::class, 'dashboard'])->name('tenant.dashboard');
});
