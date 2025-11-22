<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedGigsController;
use App\Mail\ApplicationStatus;
use App\Models\Gig;
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

// ============== GIG ROUTES =======================
// Route::resource('gigs', GigController::class);


// Test routes
Route::get('/gigs', function() {
    $gigs = Gig::all();

    return view('test.gigs.index', compact('gigs'));
});

Route::get('/saved-gigs', [SavedGigsController::class, 'savedList'])->name('gigs.saved');

Route::post('/gigs/{gig}/save', [SavedGigsController::class, 'save'])->name('gigs.save');
Route::delete('/gigs/{gig}/save', [SavedGigsController::class, 'remove'])->name('gigs.unsave');

Route::get('/gigs/{gig}/applicants', function (Gig $gig) {
    // Make sure provider owns this gig
    if (auth()->id() !== $gig->provider_id) {
        abort(403, 'Unauthorized');
    }

    // Get all applications (no eager loading)
    $applications = $gig->applications;

    return view('test.gigs.applicants', compact('gig', 'applications'));
})->name('gigs.applicants');


require __DIR__.'/auth.php';

