<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 rounded-md font-semibold transition-colors']) }}>
    {{ $slot }}
</button>
