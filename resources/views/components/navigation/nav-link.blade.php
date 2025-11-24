@props(['href', 'active', 'icon', 'disabled' => false])

@php
    $baseClasses = 'flex items-center space-x-3 p-3 text-base font-medium rounded-xl transition duration-150 ease-in-out w-full';

    if ($disabled) {
        $classes = $baseClasses . ' cursor-not-allowed text-gray-400 dark:text-gray-600';
    } elseif ($active) {
        $classes = $baseClasses . ' bg-indigo-600 text-white shadow-md';
    } else {
        $classes = $baseClasses . ' text-gray-700 dark:text-gray-300 hover:bg-indigo-50 hover:text-indigo-600';
    }
@endphp

@if ($disabled)
    <div {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <i data-lucide="{{ $icon }}" class="w-5 h-5 text-gray-400"></i>
        @endif
        <span>{{ $slot }}</span>
    </div>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <i data-lucide="{{ $icon }}" class="w-5 h-5 {{ $active ? 'text-white' : 'text-gray-400 group-hover:text-indigo-600' }}"></i>
        @endif
        <span>{{ $slot }}</span>
    </a>
@endif
