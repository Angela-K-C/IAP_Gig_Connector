<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-md px-6 py-8 bg-white shadow-lg overflow-hidden sm:rounded-lg flex flex-col items-center justify-center">
            <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Login</h2>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email Address --}}
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input 
                        id="email" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                        placeholder="jane@gmail.com" 
                        class="mt-1 block w-full" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                        placeholder="********" 
                        class="mt-1 block w-full" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Remember Me --}}
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col items-center justify-center mt-6 space-y-4">
                    {{-- Login Button --}}
                    <x-ui.Button variant="primary" class="w-full py-3" type="submit">
                        {{ __('Log in') }}
                    </x-ui.Button>

                    {{-- Signup Link --}}
                    <x-ui.Button variant="secondary" class="w-full py-3" onclick="window.location.href='{{ route('register') }}'">
                        {{ __("Don't have an account? Sign up") }}
                    </x-ui.Button>

                    {{-- Forgot Password --}}
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 underline mt-2" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
