<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gig;
use Illuminate\Support\Facades\Auth;

class GigController extends Controller
{
    /**
     * Display a listing of the provider's gigs.
     */
    public function manage()
    {
        // Fetch gigs belonging to the authenticated provider
        $gigs = Gig::where('user_id', Auth::id()) // <-- updated column
                    ->orderByDesc('created_at')
                    ->paginate(10);

        return view('provider.gigs.manage', compact('gigs'));
    }

    /**
     * Show the form for creating a new gig.
     */
    public function create()
    {
        return view('provider.gigs.create');
    }

    /**
     * Store a newly created gig in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'payment_type' => 'required|in:fixed,hourly',
            'payment_amount' => 'required|numeric',
            'required_skills' => 'nullable|string',
            'duration' => 'nullable|string|max:50',
            'application_deadline' => 'required|date',
        ]);

        Gig::create([
            'user_id' => Auth::id(), // link gig to provider
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'payment_type' => $request->payment_type,
            'payment_amount' => $request->payment_amount,
            'required_skills' => $request->required_skills ? explode(',', $request->required_skills) : null,
            'duration' => $request->duration,
            'application_deadline' => $request->application_deadline,
            'status' => 'open',
        ]);

        return redirect()->route('gigs.manage')->with('success', 'Gig posted successfully!');
    }

    public function show(Gig $gig)
{
    // Optional: Only allow the gig owner to view it
    if ($gig->user_id !== Auth::id()) {
        abort(403, 'Unauthorized access');
    }

    return view('provider.gigs.show', compact('gig'));
}
}