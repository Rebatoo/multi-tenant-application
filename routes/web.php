<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandlordRegistrationController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Auth\AdminLoginController;

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

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Test route for landlord registration
Route::get('/test-landlord-form', function() {
    $controller = new \App\Http\Controllers\LandlordRegistrationController();
    return $controller->showRegistrationForm();
});

// Landlord registration routes
Route::middleware('web')->group(function () {
    Route::get('/landlord/register', [LandlordRegistrationController::class, 'showRegistrationForm'])->name('landlord.register');
    Route::post('/landlord/register', [LandlordRegistrationController::class, 'register'])->name('landlord.register.submit');
    Route::get('/landlord/register/success', [LandlordRegistrationController::class, 'showSuccess'])->name('landlord.register.success');
});

// Admin routes
Route::prefix('admin')->group(function () {
    // Admin authentication routes
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Protected admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::resource('tenants', TenantController::class);
        Route::post('tenants/{tenant}/approve', [TenantController::class, 'approve'])->name('admin.tenants.approve');
        Route::post('tenants/{tenant}/reject', [TenantController::class, 'reject'])->name('admin.tenants.reject');
    });
});

// Tenant-specific routes
Route::domain('{tenant}.example.com')
    ->middleware(['web', 'tenant'])
    ->group(base_path('routes/tenant.php'));
