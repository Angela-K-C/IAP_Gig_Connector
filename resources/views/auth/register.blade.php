{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />

            <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">-- Select Role --</option>
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="provider" {{ old('role') == 'provider' ? 'selected' : '' }}>Provider</option>
            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Provider Fields -->
        <div id="provider-fields" class="mt-4 hidden">
            <!-- Organization Name -->
            <div class="mt-2">
                <x-input-label for="organization_name" :value="__('Organization Name')" />
                <x-text-input id="organization_name" class="block mt-1 w-full" type="text" name="organization_name" value="{{ old('organization_name') }}" />
                <x-input-error :messages="$errors->get('organization_name')" class="mt-2" />
            </div>

            <!-- Contact Number -->
            <div class="mt-2">
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" value="{{ old('contact_number') }}" />
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    const roleSelect = document.getElementById('role');
    const providerFields = document.getElementById('provider-fields');

    roleSelect.addEventListener('change', function() {
        if (this.value === 'provider') {
            providerFields.classList.remove('hidden');
        } else {
            providerFields.classList.add('hidden');
        }
    });

    // Trigger change on page load to handle old input
    window.addEventListener('DOMContentLoaded', () => {
        roleSelect.dispatchEvent(new Event('change'));
    });
</script> --}}
{{-- resources/views/auth/register.blade.php --}}
<x-guest-layout>
    <div class="flex flex-col md:flex-row items-center justify-center w-full min-h-screen">
        
        {{-- Left Illustration --}}
        <div class="hidden md:flex flex-1 items-center justify-center p-8 lg:p-12">
            <div class="text-center">
                <img src="{{ asset('images/gig-connector-illustration-small.png') }}" alt="Gig Connector Illustration" class="max-w-xs mx-auto mb-8">
                
                <h1 class="text-4xl font-extrabold text-indigo-700 mb-2">Gig Connector</h1>
                <p class="text-indigo-500 text-lg">Connect, Apply, Grow</p>
                
                <a href="{{ route('welcome') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 underline font-medium text-sm">
                    Learn More about our platform
                </a>
            </div>
        </div>

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
