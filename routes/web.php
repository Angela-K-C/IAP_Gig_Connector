<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 2. AUTHENTICATED ROUTES - DEFINED FIRST
Route::middleware(['auth', 'verified'])->group(function () {

    // The Dashboard route MUST be defined here for 'dashboard' name to be available.
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // <--- DEFINED FIRST
    Route::get('/dashboard/recommendations', [DashboardController::class, 'index'])->name('dashboard.recommendations');
    // --- TEMPORARY PROVIDER MANAGEMENT ROUTES (FOR FRONTEND LINKS) ---
    Route::get('/provider/applicants/{gig}', function ($gig) {
        return "Frontend Check OK: Provider Applicants Page for Gig #{$gig}";
    })->name('provider.applicants');

    Route::get('/provider/posts/{gig}/edit', function ($gig) {
        return "Frontend Check OK: Provider Post Edit Page for Gig #{$gig}";
    })->name('provider.edit_post');

    // --- TEMPORARY STUDENT NAVIGATION ROUTES (FOR FRONTEND LINKS) ---
    Route::get('/student/applications', function () {
        return view('student.applications.index');
    })->name('student.applications');

    Route::get('/student/saved-jobs', function () {
        return view('student.saved-jobs.index');
    })->name('student.saved_jobs');

    Route::get('/student/profile', function () {
        return view('student.profile.show');
    })->name('student.profile.view');

    Route::get('/student/profile/edit', function () {
        return view('student.profile.edit');
    })->name('student.profile.edit');

    Route::put('/student/profile', function () {
        return 'Profile Update Successful! (Frontend Check)';
    })->name('student.profile.update');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/gigs/{gig}', function ($gigId) {
        // You would pass the actual Gig model here for data loading
        return view('gigs.show', ['gigId' => $gigId]);
    })->name('gigs.show');

    // ... Any other authenticated routes ...
});

// 3. TEMPORARY TESTING ROUTE - DEFINED SECOND
// This route now correctly references the already defined 'dashboard' route name.
// (REMOVE BEFORE DEPLOYMENT!)
Route::get('/test-dashboard/{role}', function ($role) {
    $user = User::where('role', $role)->first();

    if ($user) {
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    return "Error: No user found with role '{$role}'. Please register one.";
})->name('test-dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
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

require __DIR__.'/auth.php';
