<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Handle provider registration request.
     */
    public function storeProvider(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'organization_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
            'about_provider' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'provider',
        ]);

        \App\Models\Provider::create([
            'user_id' => $user->id,
            'organization_name' => $request->organization_name,
            'contact_number' => $request->contact_number,
            'about_provider' => $request->about_provider,
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('provider.dashboard');
    }

    /**
     * Handle student registration request.
     */
    public function storeStudent(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('student.dashboard');
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:student,provider'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // If provider, create provider record
        if ($user->role === 'provider') {
            \App\Models\Provider::create([
                'user_id' => $user->id,
                'organization_name' => $request->input('organization_name', 'N/A'),
                'contact_number' => $request->input('contact_number', ''),
                'about_provider' => $request->input('about_provider', ''),
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // Redirect to correct dashboard
        if ($user->role === 'provider') {
            return redirect()->route('provider.dashboard');
        } elseif ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        }
        return redirect(route('dashboard', absolute: false));
    }
}
