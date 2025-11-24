{{-- resources/views/components/ui/input-field.blade.php --}}
@props(['label', 'name', 'type' => 'text', 'placeholder' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="block font-medium text-sm text-gray-700 mb-1">
        {{ $label }}
    </label>
    <input 
        id="{{ $name }}" 
        name="{{ $name }}" 
        type="{{ $type }}" 
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full p-2.5']) }}
    >
</div>