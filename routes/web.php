
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public home page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Dashboard (show respective dashboard based on role)
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
Route::get('/dashboard', function () {
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }
    $role = $user->role;
    if ($role === 'provider') {
        return view('provider.dashboard');
    } elseif ($role === 'student') {
        // Use controller so $gigs is passed
        return app(StudentDashboardController::class)->index(request());
    } elseif ($role === 'admin') {
        return view('admin.dashboard');
    } else {
        return view('dashboard'); // fallback
    }
})->middleware(['auth'])->name('dashboard');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Student-specific routes
    Route::get('/applications', [ApplicationController::class, 'index'])
        ->name('applications.index');
    Route::get('/recommendations', [RecommendationController::class, 'index'])
        ->name('recommendations');

    // Admin-specific routes
    Route::middleware('can:admin')->group(function () {
        Route::get('/gigs', [JobController::class, 'index'])->name('gigs.index');
        Route::get('/gigs/create', [JobController::class, 'create'])->name('gigs.create');
        Route::get('/applications/all', [ApplicationController::class, 'all'])->name('applications.all');
        Route::get('/settings', function () { return view('settings'); })->name('settings');
        Route::get('/gigs/manage', [JobController::class, 'create'])->name('gigs.manage');
    });
});

// Auth scaffolding (login, register, password reset)
require __DIR__.'/auth.php';
