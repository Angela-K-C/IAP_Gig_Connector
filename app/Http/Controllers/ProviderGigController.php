<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gig;
use Illuminate\Support\Facades\Auth;

class ProviderGigController extends Controller
{
    public function index()
    {
        $providerId = Auth::id();
        $gigs = Gig::where('provider_id', $providerId)->get();
        return view('provider.manage_gigs', compact('gigs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'required_skills' => 'required|string',
            'payment_type' => 'required|string',
            'payment_amount' => 'required|numeric',
            'duration' => 'required|string',
            'application_deadline' => 'required|date',
            'status' => 'required|string',
        ]);
        $validated['provider_id'] = Auth::id();
        Gig::create($validated);
        return redirect()->route('provider.gigs.manage')->with('success', 'Gig created successfully!');
    }
}
