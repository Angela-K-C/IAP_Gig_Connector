<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Availability') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="availability" :value="__('Availability')" />

            <select
                id="availability"
                name="availability"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                required
            >
                <option value="">Select availability</option>
                <option value="Remote" {{ old('availability', $user->availability ?? '') == 'Remote' ? 'selected' : '' }}>Remote</option>
                <option value="On-site" {{ old('availability', $user->availability ?? '') == 'On-site' ? 'selected' : '' }}>On-site</option>
                <option value="Hybrid" {{ old('availability', $user->availability ?? '') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>

            <x-input-error class="mt-2" :messages="$errors->get('availability')" />
        </div>
    </form>
</section>

