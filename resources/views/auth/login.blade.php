<x-guest-layout>
    <div class="flex flex-col md:flex-row items-center justify-center w-full min-h-screen">
        
        {{-- Left Illustration & Branding (Visible on medium screens and up) --}}
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
