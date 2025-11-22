<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\StudentProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        // dd($request->get('experiences'));

        $user = $request->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($user->isStudent()) {
            $studentData = $request->only([
                'university', 
                'year_of_study', 
                'field_of_study', 
                'bio',
                'phone_number',
                'location',
                'availability',
                'skills',
                'interests',
                'experiences'
            ]);
            if (!empty($studentData)) {
                $user->studentProfile()->update($studentData);
            }
        }

        if ($user->isProvider()) {
            $providerData = $request->only([
                'organization_name',
                'contact_number',
                'about_provider'
            ]);

            if (!empty($providerData)) {
                $user->provider()->update($providerData);
            }
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
