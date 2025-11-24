<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased bg-gray-100">

        <div class="min-h-screen flex flex-col justify-center items-center px-4">
            
            {{-- Logo --}}
            <div class="mb-6">
                <a href="/" class="flex flex-col items-center gap-2">
                    <span class="text-2xl font-bold text-indigo-700">Gig Connector</span>
                </a>
            </div>

            {{-- Card Container --}}
            <div class="w-full sm:max-w-md bg-white shadow-lg rounded-2xl p-8 border border-gray-200">

                {{-- Slot for the page content --}}
                {{ $slot }}

            </div>
        </div>

    </body>
</html>
