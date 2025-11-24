{{-- resources/views/auth/register.blade.php --}}
<x-guest-layout>
    <div class="flex flex-col md:flex-row items-center justify-center w-full min-h-screen">
        

        {{-- Right Form Section --}}
        <div class="flex-1 w-full max-w-md px-6 py-8 bg-white shadow-lg overflow-hidden sm:rounded-lg">
            <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Create Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Hidden Role Field --}}
                <input type="hidden" name="role" value="{{ request('role', 'student') }}">

                {{-- Full Name --}}
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Jane" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email --}}
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="jane@gmail.com" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="********" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                </div>

                {{-- Confirm Password --}}
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- Conditionally show extra fields for students --}}
                @if(request('role') === 'student')
                <div class="mt-4">
                    <x-input-label for="university" :value="__('University/College')" />
                    <select id="university" name="university" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        <option value="">Select here...</option>
                        <option value="strathmore">Strathmore University</option>
                        {{-- Add more options --}}
                    </select>
                    <x-input-error :messages="$errors->get('university')" class="mt-2" />
                </div>
                @endif

                <div class="flex items-center justify-end mt-6">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already have an account? Login') }}
                    </a>

                    <x-primary-button class="ml-4 bg-indigo-700 hover:bg-indigo-800">
                        {{ __('Create Account') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
