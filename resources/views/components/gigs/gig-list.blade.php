{{-- resources/views/components/gigs/gig-list.blade.php --}}
@props(['gigs'])

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($gigs as $gig)
        <x-gigs.gig-card :gig="$gig" />
    @empty
        <p class="text-gray-500 col-span-3">No gigs found matching your criteria.</p>
    @endforelse
</div>