{{-- resources/views/components/ui/button.blade.php --}}
@props(['variant' => 'primary', 'type' => 'submit', 'as' => null, 'href' => null])

@php
    $baseClasses = 'px-5 py-2.5 text-sm font-semibold rounded-md transition duration-150 ease-in-out';
    $primaryClasses = 'bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2';
    $secondaryClasses = 'bg-white text-indigo-600 border border-indigo-600 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-500';
    $classes = ($variant === 'primary') ? $primaryClasses : $secondaryClasses;
@endphp

@if($as === 'a' && $href)
    <a {{ $attributes->merge(['href' => $href, 'class' => $baseClasses . ' ' . $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $baseClasses . ' ' . $classes, 'type' => $type]) }}>
        {{ $slot }}
    </button>
@endif