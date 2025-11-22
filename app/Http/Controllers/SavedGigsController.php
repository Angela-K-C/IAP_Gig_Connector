<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;

class SavedGigsController extends Controller
{
    public function save(Gig $gig)
    {
        auth()->user()->savedGigs()->syncWithoutDetaching([$gig->id]);

        return back()->with('success', 'Gig saved!');
    }

    public function remove(Gig $gig)
    {
        auth()->user()->savedGigs()->detach($gig->id);

        return back()->with('success', 'Gig removed from saved list.');
    }

    public function savedList()
    {
        $savedGigs = auth()->user()->savedGigs()->latest()->get();

        return view('test.gigs.saved', compact('savedGigs'));
    }

}
