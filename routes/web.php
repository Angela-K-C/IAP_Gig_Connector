
<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedGigsController;
use App\Mail\ApplicationStatus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
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
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
Route::resource('gigs', GigController::class);

Route::patch('/gigs/{gig}/close', [GigController::class, 'close'])->name('gigs.close');
Route::get('/gigs/{gig}/applicants', [GigController::class, 'applicants'])->name('gigs.applicants');


// Saving gigs
Route::get('/saved-gigs', [SavedGigsController::class, 'savedList'])->name('gigs.saved');
Route::post('/gigs/{gig}/save', [SavedGigsController::class, 'save'])->name('gigs.save');
Route::delete('/gigs/{gig}/save', [SavedGigsController::class, 'remove'])->name('gigs.unsave');

require __DIR__.'/auth.php';