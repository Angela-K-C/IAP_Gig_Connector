<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Gig Connector</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    <div class="flex flex-row w-full min-h-screen bg-white mx-auto" style="transform: scale(0.85); transform-origin: top center;">
        <!-- Left Column: Branding & Info -->
        <div class="flex flex-col justify-center items-center w-1/2 h-full p-0 bg-white">
            <img src="{{ asset('images/illustration.png') }}" alt="Illustration" class="object-contain w-[120px] h-[120px] mb-6">
            <h1 class="font-sans font-extrabold text-[48px] leading-[60px] text-center text-primary mb-2 drop-shadow">Gig Connector</h1>
            <p class="font-serif font-extrabold text-[24px] leading-[32px] text-center text-dark mb-4 drop-shadow">Connect, Apply, Grow</p>
            <a href="#" class="font-sans font-bold text-[16px] leading-[24px] text-center text-primary hover:underline">Learn More about our platform</a>
        </div>
        <!-- Right Column: Form -->
        <div class="flex flex-col justify-center items-center w-1/2 h-full p-0 bg-white">
            <h2 class="font-sans font-extrabold text-[56px] leading-[72px] text-center text-primary mb-8 drop-shadow">Sign In</h2>
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6 w-[400px]">
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="email" class="font-sans font-bold text-[14px] leading-[18px] text-dark">Email</label>
                    <input id="email" class="block w-full py-3 px-3 border border-border rounded-lg bg-white text-[16px] font-sans placeholder-dark" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="jane@gmail.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password" class="font-sans font-bold text-[14px] leading-[18px] text-dark">Password</label>
                    <input id="password" class="block w-full py-3 px-3 border border-border rounded-lg bg-white text-[16px] font-sans placeholder-dark" type="password" name="password" required autocomplete="current-password" placeholder="xxxxxxxxx" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-border text-primary shadow-sm focus:ring-primary" name="remember">
                        <span class="ms-2 text-sm text-dark">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-primary hover:text-accent" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>
                <button type="submit" class="w-full px-7 py-4 font-sans font-bold text-[20px] text-white bg-accent border border-accent rounded-lg shadow hover:bg-primary transition">Sign In</button>
                <p class="font-sans text-[18px] leading-[30px] text-center text-dark mt-6">Don't have an account? <a href="{{ route('register') }}" class="font-semibold text-primary hover:underline">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>
</html>
