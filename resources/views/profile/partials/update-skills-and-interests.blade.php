<header>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Skills and Interests') }}
    </h2>
</header>

<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
        <x-input-label for="skills" :value="__('Skills')" />

        <livewire:skills-input />
    </div>

    <div>
        <x-input-label for="interests" :value="__('Interests')" />

        <livewire:interests-input />
    </div>

</form>
