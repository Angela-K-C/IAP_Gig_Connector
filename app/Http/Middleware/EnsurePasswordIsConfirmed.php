<?php
namespace App\Http\Middleware;

// Use the correct base class for Laravel 12
use Illuminate\Auth\Middleware\RequirePassword;

class EnsurePasswordIsConfirmed extends RequirePassword
{
    /**
     * Get the URL the user should be redirected to when the password confirmation fails.
     */
    protected function redirectTo($request)
    {
        return route('password.confirm');
    }
}