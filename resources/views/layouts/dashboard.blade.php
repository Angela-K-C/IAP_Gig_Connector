{{-- resources/views/layouts/dashboard.blade.php --}}
<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex">

        {{-- 1. Sidebar Navigation --}}
        <x-navigation.sidebar-nav />

        {{-- 2. Main Content Area --}}
        <div class="flex-grow flex flex-col overflow-y-auto">
            
            {{-- Header / Greeting Section --}}
            <header class="bg-white shadow px-6 py-4 lg:px-10 lg:py-6 flex flex-col space-y-3">
                @php
                    $user = Auth::user();
                    $role = $user?->role ?? 'student';
                    $greeting = 'Welcome back';
                    $customMessage = match($role) {
                        'student' => 'Here are your latest applications and opportunities.',
                        'admin' => 'Manage job postings, view applications, and control settings.',
                        'provider' => 'Manage your offerings and connect with talent.',
                        default => 'Here is your dashboard.',
                    };
                @endphp

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $greeting }}, {{ $user?->name ?? 'User' }} 👋</h1>
                    <p class="text-gray-600 mt-1">{{ $customMessage }}</p>
                </div>

                {{-- Search Bar --}}
                <div class="mt-3 w-full max-w-md">
                    <input 
                        type="text" 
                        placeholder="Search..." 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-sm"
                    />
                </div>
            </header>

            {{-- Main Content Section --}}
            <main class="p-6 lg:p-10 flex-grow">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-app-layout>
