<header>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('About You') }}
    </h2>
</header>

<div>
    <x-input-label for="bio" :value="__('Bio')" />

    <textarea 
        id="bio"
        name="bio"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        rows="4"
        required
    >{{ old('description', $user->bio ?? '') }}</textarea>

    <x-input-error class="mt-2" :messages="$errors->get('bio')" />
</div>

