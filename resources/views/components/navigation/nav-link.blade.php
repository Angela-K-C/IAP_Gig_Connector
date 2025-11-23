{{-- resources/views/components/navigation/nav-link.blade.php --}}
@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center p-3 rounded-lg text-sm font-semibold text-indigo-700 bg-indigo-50 transition duration-150'
                : 'flex items-center p-3 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>