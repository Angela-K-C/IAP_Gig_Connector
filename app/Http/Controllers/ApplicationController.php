<?php
// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $applications = $user->applications ?? []; // adjust if you have a relation
        return view('applications.index', compact('applications'));
    }
}
