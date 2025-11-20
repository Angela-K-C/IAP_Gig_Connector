<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Mail\ApplicationStatus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
});

// Protected routes for providers
Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/provider/dashboard', [ProviderController::class, 'dashboard'])->name('provider.dashboard');
    Route::get('/gigs/create', [GigController::class, 'create'])->name('gigs.create');
});

// Protected routes for admins
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // ... add more admin-specific routes here
});

// ============== APPLICATION ROUTES =================
Route::resource('applications', ApplicationController::class);


// Test function to send mails
Route::get('/send-mail', function() {
    Mail::to("YOUR_EMAIL_HERE")->send(new ApplicationStatus());

    return "Email sent successfully";
});

// Preview mails
Route::get('/mailable', function() {
    return new ApplicationStatus();
});

require __DIR__.'/auth.php';
