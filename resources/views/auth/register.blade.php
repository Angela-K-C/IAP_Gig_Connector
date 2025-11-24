<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - Gig Connector</title>

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
            <h2 class="font-sans font-extrabold text-[56px] leading-[72px] text-center text-primary mb-8 drop-shadow">Welcome</h2>
            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-6 w-[400px]">
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="name" class="font-sans font-bold text-[14px] leading-[18px] text-dark">Full Name / Organization Name</label>
                    <input id="name" class="block w-full py-3 px-3 border border-border rounded-lg bg-white text-[16px] font-sans placeholder-dark" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="jane" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="email" class="font-sans font-bold text-[14px] leading-[18px] text-dark">Email</label>
                    <input id="email" class="block w-full py-3 px-3 border border-border rounded-lg bg-white text-[16px] font-sans placeholder-dark" type="email" name="email" value="{{ old('email') }}" required placeholder="jane@gmail.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password" class="font-sans font-bold text-[14px] leading-[18px] text-dark">Password</label>
                    <input id="password" class="block w-full py-3 px-3 border border-border rounded-lg bg-white text-[16px] font-sans placeholder-dark" type="password" name="password" required autocomplete="new-password" placeholder="xxxxxxxxx" />
                    <p class="mt-1 text-xs text-dark">At least 8 characters.</p>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password_confirmation" class="font-sans font-bold text-[14px] leading-[18px] text-dark">Confirm Password</label>
                    <input id="password_confirmation" class="block w-full py-3 px-3 border border-border rounded-lg bg-white text-[16px] font-sans placeholder-dark" type="password" name="password_confirmation" required placeholder="xxxxxxxxx" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="role" class="font-sans font-bold text-[14px] leading-[18px] text-dark">Provider Type (Register as)</label>
                    <select id="role" name="role" class="block w-full py-3 px-3 border border-border rounded-lg bg-white text-[16px] font-sans" required onchange="toggleProviderFields(this.value)">
                        <option value="" disabled selected>Select here...</option>
                        <option value="student">Student</option>
                        <option value="provider">Provider</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                <div id="provider-fields" class="hidden p-4 mb-6 border border-gray-200 rounded-lg bg-gray-50">
                    <h3 class="mb-3 text-sm font-bold text-primary">Additional Provider Details</h3>
                    <div class="mb-4">
                        <label for="contact_number" class="block mb-1 text-sm font-bold text-dark">Contact Number</label>
                        <input id="contact_number" name="contact_number" type="text" class="block w-full mt-1 border border-border rounded-lg shadow-sm focus:border-primary focus:ring-primary" />
                    </div>
                    <div class="mb-4">
                        <label for="about_provider" class="block mb-1 text-sm font-bold text-dark">About Provider</label>
                        <textarea id="about_provider" name="about_provider" class="block w-full mt-1 border border-border rounded-lg shadow-sm focus:border-primary focus:ring-primary" rows="3"></textarea>
                    </div>
                </div>
                <button type="submit" class="w-full px-7 py-4 font-sans font-bold text-[20px] text-white bg-accent border border-accent rounded-lg shadow hover:bg-primary transition">Sign Up</button>
                <p class="font-sans text-[18px] leading-[30px] text-center text-dark mt-6">Already have an account? <a href="{{ route('login') }}" class="font-semibold text-primary hover:underline">Login</a></p>
            </form>
        </div>
    </div>
        
    <script>
        function toggleProviderFields(role) {
            const providerFields = document.getElementById('provider-fields');
            if (role === 'provider') {
                providerFields.classList.remove('hidden');
            } else {
                providerFields.classList.add('hidden');
            }
        }
    </script>
</body>
</html>