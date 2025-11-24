@props(['gig'])

<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-5 hover:shadow-xl hover:border-indigo-300 dark:hover:border-indigo-700 transition-all duration-300">

    {{-- Header --}}
    <div class="flex items-start gap-3 mb-4">
        <div class="{{ $gig['logo_bg'] }} w-12 h-12 rounded-lg flex items-center justify-center text-white font-bold text-lg">
            {{ $gig['logo_text'] }}
        </div>

        <div class="flex-1 min-w-0">
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 text-base leading-snug line-clamp-2">
                {{ $gig['title'] }}
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $gig['company'] }}</p>
        </div>
    </div>

    {{-- Location --}}
    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-3">
        <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
        <span class="truncate">{{ $gig['location'] }}</span>
    </div>

    {{-- Badges --}}
    <div class="flex flex-wrap gap-2 mb-3">
        <span class="px-2.5 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md text-xs font-medium">
            {{ $gig['level'] }}
        </span>

        <span class="px-2.5 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md text-xs font-medium">
            {{ $gig['type'] }}
        </span>

        @if (!empty($gig['badge']))
            <span class="px-2.5 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-md text-xs font-medium">
                {{ $gig['badge'] }}
            </span>
        @endif
    </div>

    {{-- Salary --}}
    <div class="mb-4">
        <span class="text-xl font-bold text-gray-900 dark:text-gray-100">
            ${{ number_format($gig['salary']) }}
        </span>
        <span class="text-sm text-gray-500 dark:text-gray-400 ml-1">PA</span>
    </div>

    {{-- Description --}}
    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
        {{ $gig['description'] }}
    </p>

    {{-- Footer --}}
    <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
        <span class="text-xs text-gray-500 dark:text-gray-400">
            {{ $gig['date'] }}
        </span>

        <div class="flex items-center gap-1">
            <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg" title="Save">
                <i data-lucide="bookmark" class="w-4 h-4 text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400"></i>
            </button>

            <a href="#" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition">
                View Details
            </a>
        </div>
    </div>
</div>
