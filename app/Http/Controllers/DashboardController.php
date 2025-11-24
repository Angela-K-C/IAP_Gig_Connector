<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show() {
        $user = auth()->user();

        $gigs = [];

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->isProvider()) {
            $gigs = $user->provider->gigs()->withCount('applications')->get();
            return view('provider.dashboard', compact('gigs'));

        } elseif ($user->isStudent()) {
            $gigs = Gig::all();

            return view('student.dashboard', compact('gigs'));

        } elseif ($user->isAdmin()) {
            return view('admin.dashboard');
            
        } else {
            return view('dashboard'); // fallback
        }
    }
}
