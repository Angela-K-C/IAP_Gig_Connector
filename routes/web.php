<?php

use App\Http\Controllers\Provider\DashboardController as ProviderDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\Provider\GigController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Home Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Role-based dashboard route
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'provider') {
        return app(ProviderDashboardController::class)->index(request());
    } elseif ($user->role === 'student') {
        return app(StudentDashboardController::class)->index(request());
    }
    abort(403);
})->middleware(['auth'])->name('dashboard');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // General Profile routes (for both students and providers)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Provider Profile Routes
    Route::get('/provider/profile', function () {
        $user = Auth::user();
        $profile = $user->providerProfile;
        return view('provider.profile.show', compact('user', 'profile'));
    })->name('provider.profile.show');

    Route::patch('/provider/profile', function () {
        $user = Auth::user();
        $validatedUser = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);
        $user->name = $validatedUser['name'];
        $user->email = $validatedUser['email'];
        if (!empty($validatedUser['password'])) {
            $user->password = bcrypt($validatedUser['password']);
        }
        $user->save();

        $validatedProfile = request()->validate([
            'organization_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:20'],
            'about_provider' => ['nullable', 'string', 'max:1000'],
            'logo_path' => ['nullable', 'string', 'max:255'],
        ]);

        $profile = $user->providerProfile;
        if (!$profile) {
            $profile = new \App\Models\ProviderProfile();
            $profile->user_id = $user->id;
        }
        $profile->organization_name = $validatedProfile['organization_name'];
        $profile->contact_number = $validatedProfile['contact_number'] ?? null;
        $profile->about_provider = $validatedProfile['about_provider'] ?? null;
        $profile->logo_path = $validatedProfile['logo_path'] ?? null;
        $profile->save();

        return back()->with('status', 'profile-updated');
    })->name('provider.profile.update');

    // Student Profile Routes
    Route::get('/student/profile', function () {
        $user = Auth::user();
        return view('student.profile.show', compact('user'));
    })->name('student.profile.show');

    // GET route for editing the profile
    Route::get('/student/profile/edit', function () {
        $user = Auth::user();
        return view('student.profile.edit', compact('user'));
    })->name('student.profile.edit');

    // PATCH route for updating the profile
    Route::patch('/student/profile', function () {
        $user = Auth::user();

        $validated = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'location' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'skills' => ['nullable', 'array'],  // expecting array of skills
            'interests' => ['nullable', 'string'],
            'experience' => ['nullable', 'string'],
            'university' => ['nullable', 'string', 'max:255'],
            'year_of_study' => ['nullable', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'availability_remote' => ['nullable', 'boolean'],
            'availability_physical' => ['nullable', 'boolean'],
            'preferred_hours' => ['nullable', 'in:weekdays,weekends,evenings'],
            'cv_path' => ['nullable', 'string', 'max:255'],
            'portfolio_link' => ['nullable', 'string', 'max:255'],
        ]);

        // Update User table
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        // Update or create student profile
        $profile = $user->student ?? new \App\Models\Student();
        $profile->user_id = $user->id;
        $profile->phone = $validated['phone'] ?? $profile->phone;
        $profile->location = $validated['location'] ?? $profile->location;
        $profile->university = $validated['university'] ?? $profile->university;
        $profile->year_of_study = $validated['year_of_study'] ?? $profile->year_of_study;
        $profile->field_of_study = $validated['field_of_study'] ?? $profile->field_of_study;
        $profile->skills = $validated['skills'] ?? $profile->skills;
        $profile->interests = $validated['interests'] ?? $profile->interests;
        $profile->experience = $validated['experience'] ?? $profile->experience;
        $profile->bio = $validated['bio'] ?? $profile->bio;
        $profile->availability_remote = $validated['availability_remote'] ?? $profile->availability_remote;
        $profile->availability_physical = $validated['availability_physical'] ?? $profile->availability_physical;
        $profile->preferred_hours = $validated['preferred_hours'] ?? $profile->preferred_hours;
        $profile->cv_path = $validated['cv_path'] ?? $profile->cv_path;
        $profile->portfolio_link = $validated['portfolio_link'] ?? $profile->portfolio_link;
        $profile->save();

        return redirect()->route('student.profile.show')->with('status', 'profile-updated');
    })->name('student.profile.update');


    // Student-specific routes
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations');

    // Provider-specific Gig routes
    Route::prefix('provider')->group(function () {
        Route::get('/gigs/manage', [GigController::class, 'manage'])->name('gigs.manage');
        Route::get('/gigs/{gig}', [GigController::class, 'show'])->name('gigs.show');
        Route::get('/gigs/create', [GigController::class, 'create'])->name('gigs.create');
        Route::post('/gigs', [GigController::class, 'store'])->name('gigs.store');
    });

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';
