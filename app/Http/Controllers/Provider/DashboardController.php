<?php
namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gig;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $gigs = Gig::where('user_id', Auth::user()->id)
                    ->withCount('applications')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('provider.dashboard', compact('gigs'));
    }
}
