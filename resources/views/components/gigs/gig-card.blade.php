{{-- resources/views/components/gigs/gig-card.blade.php --}}
@props(['gig'])

<div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col justify-between" style="border: 1px dashed #d1d5db;">
    <div class="p-4">
        {{-- Header: Logo, Title, and Salary --}}
        <div class="flex items-start justify-between mb-3">
            {{-- Placeholder for company logo (e.g., Ps logo) --}}
            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-xs font-bold text-gray-600" style="background-color: #3182CE; color: white;">Ps</div>
            <div class="text-right">
                <p class="text-xl font-bold text-gray-900">${{ number_format($gig['salary']) }} PA</p>
            </div>
        </div>
        
        {{-- Job Title and Details --}}
        <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $gig['title'] ?? 'Senior Product Designer' }}</h3>
        <p class="text-sm text-gray-500 mb-2">{{ $gig['location'] ?? 'Kabul, New, Afghanistan' }}</p>
        
        {{-- Employment Type --}}
        <div class="flex space-x-3 text-xs font-medium mb-3 text-gray-600">
            <span>{{ $gig['level'] ?? 'Mid-Senior' }}</span>
            <span class="text-gray-400">•</span>
            <span>{{ $gig['type'] ?? 'Full-Time' }}</span>
        </div>
        
        {{-- Description --}}
        <p class="text-sm text-gray-600 mb-3 line-clamp-3">
            {{ $gig['description'] ?? 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or less normal.' }}
        </p>
    </div>
    
    {{-- Footer: Tags and Actions --}}
    <div class="border-t border-gray-100 p-4 flex justify-between items-center text-xs">
        <div>
            @foreach($gig['tags'] ?? ['#Design', '#Senior', '#Experience'] as $tag)
                <span class="text-indigo-600 font-medium mr-2">{{ $tag }}</span>
            @endforeach
        </div>
        <div class="text-gray-400">
            <span class="mr-3">{{ $gig['date'] ?? '28 March 2021' }}</span>
            <a href="#" class="hover:text-indigo-600">📎</a>
            <a href="#" class="hover:text-indigo-600">🔖</a>
        </div>
    </div>
</div>