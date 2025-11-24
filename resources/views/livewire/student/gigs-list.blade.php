<div>
    {{-- Search Input --}}
    <div class="mb-8">
        <input
            type="text"
            placeholder="Search gigs..."
            wire:model.live.debounce.200ms="search"
            class="w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-100"
        />
    </div>

    {{-- Jobs Count --}}
    <div class="flex items-center justify-between mb-6">
        <div class="text-sm text-gray-600 dark:text-gray-400">
            <span class="font-semibold text-gray-900 dark:text-gray-100 text-lg">{{ $gigs->count() }}</span>
            <span class="ml-1">Gigs Found</span>
        </div>
    </div>

    {{-- Gig Cards --}}
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
</div>
