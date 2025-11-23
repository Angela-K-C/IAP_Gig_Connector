{{-- resources/views/layouts/dashboard.blade.php --}}
<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex">
        
        {{-- 1. Fixed Sidebar Navigation --}}
        <x-navigation.sidebar-nav /> 
        {{-- NOTE: You will need logic inside sidebar-nav to conditionally render Student or Provider links --}}

        {{-- 2. Main Content Area (Scrollable) --}}
        <div class="flex-grow flex flex-col overflow-y-auto">
            
            {{-- Optional: A minimalist Header component can go here --}}
            
            {{-- Main Content Section --}}
            <main class="p-6 lg:p-10">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-app-layout>