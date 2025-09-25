<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JobApplicationController;
// =============================
// Public Pages
// =============================
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/projects', 'projects')->name('projects');
Route::view('/contact', 'contact')->name('contact');
Route::get('/careers', [JobApplicationController::class, 'index'])->name('careers');
Route::view('/vendors','vendors')->name('vendors');


// =============================
// Authenticated User Dashboard
// =============================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// =============================
// Profile Routes
// =============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =============================
// Authentication Routes
// (already included in Breeze's routes/auth.php)
// =============================
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// =============================
// Admin Routes
// =============================
Route::middleware(['auth','verified'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::view('/', 'admin.dashboard')->name('dashboard');

    // Jobs CRUD
    Route::resource('jobs', JobController::class);

    // Extra: View job applicants
    Route::get('jobs/{job}/applicants', [JobController::class, 'applicants'])->name('jobs.applicants');

    // (Optional) Careers & Vendors if you want later
    // Route::resource('careers', CareerController::class);
    // Route::get('vendors', [VendorController::class, 'index'])->name('vendors');
});
use App\Http\Controllers\Api\JobApiController as JobApiController;

Route::apiResource('jobs', JobApiController::class);



// User-facing careers/jobs page
// Route::get('/careers', [JobApplicationController::class, 'index'])->name('jobs.index');

// Job application form submission
Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');
Route::get('/jobs/{jobId}/applicants', [JobApplicationController::class, 'getApplicants']);


//contact controller
use App\Http\Controllers\ContactController;

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

use App\Http\Controllers\SupplierController;

Route::get('/supplier/register', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/register', [SupplierController::class, 'store'])->name('supplier.store');


Route::middleware(['auth','verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::delete('suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    Route::get('suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
});



use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});



