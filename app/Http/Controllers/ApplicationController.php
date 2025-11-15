<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of all applications
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            // Admin sees all applications
            $applications = Application::all();

        } else if ($user->isProvider()) {
            // Providers see applications for their jobs only
            // To be updated after seeing gig 
            $applications = collect(); // empty collection (for now)

        } else if ($user->isStudent()) {
            // Student see only their own applications
            $applications = Application::where('student_id', $user->id)->get();
        
        } else {
            // Fallback
            $applications = collect();
        }
        
        return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created application in storage.
     */
    public function store(Request $request)
    {
        // Validate application creation request
        $request->validate([
            'job_id' => 'required|integer',
            'status' => 'required|string'
        ]);

        // Prevent duplicate applications
        $exists = Application::where('job_id', $request->job_id)
                    ->where('student_id', auth()->id())
                    ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Create application
        Application::create([
            'job_id' => $request->job_id,
            'student_id' => auth()->id(),
            'status' => $request->status,
            'applied_at' => now()
        ]);

        // Redirect to applications page with success message
        return redirect()->route('applications.index')->with('success', 'Application successfully created!');
    }

    /**
     * Display the specified application.
     */
    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update status from pending to approved, shortlisted or rejected
     */
    public function update(Request $request, Application $application)
    {
        // Validate status
        $request->validate([
            'status' => 'required|string|in:pending,approved,shortlisted,rejected'
        ]);

        // Update status
        $application->status = $request->status;
        $application->save();

        return redirect()->route('applications.index')->with('success', 'Application status successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        // Delete application
        $application->delete();

        // Redirect back to applications page
        return redirect()->route('applications.index')->with('success', 'Application successfully deleted!');
    }
}
