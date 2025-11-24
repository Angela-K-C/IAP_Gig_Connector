<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex flex-col items-start justify-start p-6 lg:p-10">
        @php
            $user = Auth::user();
            $role = $user?->role ?? 'student';
            $greeting = $role === 'admin' ? 'Welcome back, Admin!' : 'Welcome back!';
            $customMessage = $role === 'admin' 
                ? 'Manage job postings, view applications, and adjust settings.' 
                : 'Check your applications and stay updated on opportunities.';
        @endphp

        {{-- Greeting --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                Hello, {{ $user?->name ?? 'User' }}!
            </h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">
                {{ $customMessage }}
            </p>
        </div>
        {{ $slot }}
    </div>
</x-app-layout>
