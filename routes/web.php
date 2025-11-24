
<?php

<<<<<<< HEAD
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedGigsController;
use App\Mail\ApplicationStatus;
use App\Models\Gig;
use Illuminate\Support\Facades\Mail;
=======
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\JobController;
>>>>>>> NewProduction
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

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'role:admin'])->group(function() {
//     Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
//     Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
// });

// Protected routes for providers
// Route::middleware(['auth', 'role:provider'])->group(function () {
//     Route::get('/provider/dashboard', [ProviderController::class, 'dashboard'])->name('provider.dashboard');
//     Route::get('/gigs/create', [GigController::class, 'create'])->name('gigs.create');
// });

// Protected routes for admins
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     // ... add more admin-specific routes here
// });

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

// ============== GIG ROUTES =======================
Route::resource('gigs', GigController::class);

Route::patch('/gigs/{gig}/close', [GigController::class, 'close'])->name('gigs.close');
Route::get('/gigs/{gig}/applicants', [GigController::class, 'applicants'])->name('gigs.applicants');


// Test routes
Route::get('/saved-gigs', [SavedGigsController::class, 'savedList'])->name('gigs.saved');

Route::post('/gigs/{gig}/save', [SavedGigsController::class, 'save'])->name('gigs.save');
Route::delete('/gigs/{gig}/save', [SavedGigsController::class, 'remove'])->name('gigs.unsave');



require __DIR__.'/auth.php';

=======
// Auth scaffolding (login, register, password reset)
require __DIR__.'/auth.php';
>>>>>>> NewProduction
