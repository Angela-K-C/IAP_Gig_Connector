<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Registration routes for provider and student
Route::get('/register/provider', function() {
    return view('auth.register');
})->name('provider.register');

Route::post('/register/provider', [App\Http\Controllers\Auth\RegisteredUserController::class, 'storeProvider'])->name('provider.register.submit');

Route::get('/register/student', function() {
    return view('auth.register');
})->name('student.register');

Route::post('/register/student', [App\Http\Controllers\Auth\RegisteredUserController::class, 'storeStudent'])->name('student.register.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
});





////////// Protected routes for providers ///////////
Route::middleware(['auth'])->group(function () {
    // Provider dashboard
    Route::get('/provider/dashboard', function() {
        return view('provider.dashboard');
    })->name('provider.dashboard');

    // Manage gigs
    Route::get('/provider/gigs/manage', [\App\Http\Controllers\ProviderGigController::class, 'index'])->name('provider.gigs.manage');
    // Create gig page
    Route::get('/provider/gigs/create', function() {
        return view('provider.create_gig');
    })->name('provider.gigs.create');

    // Applications
    Route::get('/provider/applications', function() {
        return view('provider.index');
    })->name('provider.applications.index');

    // Profile (placeholder)
    Route::get('/provider/profile', function() {
        return 'Provider Profile Page';
    })->name('provider.profile');

    Route::post('/provider/gigs/store', [\App\Http\Controllers\ProviderGigController::class, 'store'])->name('provider.gigs.store');
});







////////////// Protected routes for admins ///////////////
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // ... add more admin-specific routes here
});

// ============== APPLICATION ROUTES =================
Route::resource('applications', ApplicationController::class);

require __DIR__.'/auth.php';
