{{-- resources/views/student/dashboard.blade.php --}}

<div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
    <x-navigation.sidebar-nav />
    
    <div class="flex-1 overflow-auto">
        <x-dashboard-layout>
            {{-- Student-specific message --}}
            <div class="mb-6">
                <p class="text-lg text-indigo-700 dark:text-indigo-400 font-semibold">
                    Browse gigs, apply to opportunities, and track your applications here.
                </p>
            </div>

            {{-- Livewire Gigs List --}}
            @livewire('student.gigs-list')
        </x-dashboard-layout>
    </div>
</div>

