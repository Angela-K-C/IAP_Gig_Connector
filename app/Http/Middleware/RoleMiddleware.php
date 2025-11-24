<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  The required role (e.g., 'student', 'provider')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Check if the user is authenticated
        if (! Auth::check()) {
            return redirect('login'); // Redirect to login if not logged in
        }

        $user = Auth::user();

        // 2. Check if the authenticated user's role matches the required role
        if ($user->role !== $role) {
            
            // If they are logged in but unauthorized, redirect them to their OWN dashboard
            // This prevents a Provider from seeing a 403 error on a Student page; they just go home.
            return redirect()->route($user->role . '.dashboard'); 
        }

        return $next($request);
    }
}