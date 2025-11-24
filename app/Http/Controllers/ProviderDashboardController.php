<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Gig;

class ProviderDashboardController extends Controller
{
    public function index()
    {
        $providerId = Auth::id();
        $jobs = Gig::where('provider_id', $providerId)
            ->get()
            ->map(function ($gig) {
                return [
                    'id' => $gig->id,
                    'title' => $gig->title,
                    'short_desc' => $gig->description,
                ];
            });
        return view('provider.dashboard', compact('jobs'));
    }
}
