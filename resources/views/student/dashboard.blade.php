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

            {{-- Search Bar Component --}}
            <form method="GET" action="{{ route('dashboard') }}" class="mb-8">
                <x-forms.search-form />
            </form>

            {{-- Jobs Count and Sort --}}
            <div class="flex items-center justify-between mb-6">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    <span class="font-semibold text-gray-900 dark:text-gray-100 text-lg">{{ count($gigs ?? []) }}</span> 
                    <span class="ml-1">Gigs Found</span>
                </div>
            </div>

            {{-- Gig Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($gigs as $gig)
                    <x-gigs.gig-card :gig="$gig" />
                @empty
                    <div class="col-span-full text-center py-16">
                        <i data-lucide="search" class="w-12 h-12 text-gray-300 dark:text-gray-600 mx-auto mb-3"></i>
                        <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">No gigs found</p>
                        <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Try adjusting your search criteria</p>
                    </div>
                @endforelse
            </div>
        </x-dashboard-layout>
    </div>
</div>

