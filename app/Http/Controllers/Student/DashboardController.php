<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Gig;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Gig::query()->where('status', 'active');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Sort filter
        switch ($request->get('sort', 'newest')) {
            case 'oldest':
                $query->oldest();
                break;
            case 'salary_high':
                $query->orderByDesc('salary');
                break;
            case 'salary_low':
                $query->orderBy('salary');
                break;
            default:
                $query->latest();
        }

        $gigs = $query->paginate(12);

        return view('student.dashboard', compact('gigs'));
    }
}
