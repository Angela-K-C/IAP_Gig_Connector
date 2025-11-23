<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;

class GigController extends Controller
{
    // Fetch all gigs
    public function index()
    {
        return response()->json(Gig::all());
    }

    // View job details
    public function show($id)
    {
        $gig = Gig::findOrFail($id);
        return response()->json($gig);
    }

    // Create a new gig
    public function store(Request $request)
    {
        $validated = $request->validate([
            'provider_id' => 'required|exists:providers,user_id',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'required_skills' => 'nullable|string',
            'payment_type' => 'required|in:fixed,hourly',
            'payment_amount' => 'required|numeric|min:0',
            'duration' => 'required|string|max:50',
            'application_deadline' => 'required|date',
            'status' => 'in:open,closed',
        ]);

        $gig = Gig::create($validated);
        return response()->json($gig, 201);
    }

    // Edit gig (optional)
    public function edit($id)
    {
        $gig = Gig::findOrFail($id);
        return response()->json($gig);
    }

    // Update gig (optional)
    public function update(Request $request, $id)
    {
        $gig = Gig::findOrFail($id);
        $gig->update($request->all());
        return response()->json($gig);
    }
    // Delete gig
    public function destroy($id)
{
    $gig = Gig::findOrFail($id);
    $gig->delete();
    return response()->json(['message' => 'Gig deleted successfully']);
}
}