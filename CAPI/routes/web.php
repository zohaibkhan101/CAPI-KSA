<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// Public Routes


// Dashboard (authenticated users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth','is_admin'])->prefix('admin')->group(function () {

    // Admin Dashboard
    
    // Jobs CRUD
    Route::resource('jobs', JobController::class);

    // Careers CRUD
    // Route::resource('careers', CareerController::class);

    // Vendors
    // Route::get('vendors', [VendorController::class, 'index'])->name('admin.vendors');
});
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
