<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="'Register as:'" />
            <select id="role" name="role" class="block mt-1 w-full" required
                onchange="document.getElementById('provider-fields').classList.toggle('hidden', this.value !== 'provider')">
                <option value="student">Student</option>
                <option value="provider">Provider</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Provider Fields -->
        <div id="provider-fields" class="hidden mt-4">
            <x-input-label for="organization_name" :value="'Organization Name'" />
            <x-text-input id="organization_name" name="organization_name" type="text" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('organization_name')" class="mt-2" />

            <x-input-label for="contact_number" :value="'Contact Number'" />
            <x-text-input id="contact_number" name="contact_number" type="text" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />

            <x-input-label for="about_provider" :value="'About Provider'" />
            <textarea id="about_provider" name="about_provider" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3"></textarea>
            <x-input-error :messages="$errors->get('about_provider')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
            <a href="{{ route('login') }}" class="ml-4 text-sm text-blue-600 hover:underline">Already registered? Login</a>
        </div>
    </form>
</x-guest-layout>
