<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tenant = session('tenant');
    return view('tenant.dashboard', compact('tenant'));
})->name('tenant.dashboard');

// Add more tenant-specific routes here
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('tenant.profile');
    })->name('tenant.profile');
}); 