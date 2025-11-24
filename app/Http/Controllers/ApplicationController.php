<?php
// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display the user's applications
     */
    public function index()
    {
        $user = Auth::user();

        // Eager load related gig
        $applications = $user->applications()->with('gig')->orderBy('created_at', 'desc')->get();

        return view('student.gigs.management', compact('applications'));
    }

    /**
     * Delete an application
     */
    public function destroy(Application $application)
    {
        // Make sure the authenticated user owns this application
        if ($application->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
