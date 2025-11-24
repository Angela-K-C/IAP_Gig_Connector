<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gig;
use Illuminate\Http\Request;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gigs = Gig::all();
        
        return view('dashboard', compact('gigs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('provider.gigs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string|max:255',
            'payment_type' => 'required|in:fixed,hourly',
            'payment_amount' => 'required|numeric',
            'duration' => 'nullable|string|max:255',
            'application_deadline' => 'required|date',
        ]);

        Gig::create([
            'provider_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'payment_type' => $request->payment_type,
            'payment_amount' => $request->payment_amount,
            'duration' => $request->duration,
            'application_deadline' => $request->application_deadline,
        ]);

        return redirect()->route('dashboard')->with('success', 'Gig created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gig $gig)
    {
        $user = auth()->user();

        $hasApplied = false;

        if ($user->isStudent()) {
            // check if the user has applied
            $hasApplied = $gig->applications->contains('student_id', $user->id);
        }

        return view('gigs.show', compact('gig', 'hasApplied'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gig $gig)
    {
        $categories = Category::all();
        return view('test.gigs.edit', compact('gig', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gig $gig)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string|max:255',
            'payment_type' => 'required|in:fixed,hourly',
            'payment_amount' => 'required|numeric',
            'duration' => 'nullable|string|max:255',
            'application_deadline' => 'required|date',
        ]);

        $gig->update($request->only([
            'title',
            'description',
            'category_id',
            'location',
            'payment_type',
            'payment_amount',
            'duration',
            'application_deadline',
        ]));

        return redirect()->route('gigs.show', $gig)->with('success', 'Gig updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gig $gig)
    {
        //
    }

    // Close gig
    public function close(Gig $gig) {
        if ($gig->provider_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $gig->update([
            'status' => 'closed',
        ]);

        return redirect()->back()->with('success', 'Applications have been closed for this gig.');
    }

    // See gig applicants
    public function applicants(Gig $gig) {
        // Make sure provider owns this gig
        if (auth()->id() !== $gig->provider_id) {
            abort(403, 'Unauthorized');
        }

        // Get all applications (no eager loading)
        $applications = $gig->applications;

        return view('test.gigs.applicants', compact('gig', 'applications'));
    }
}