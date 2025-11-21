<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w space-y-10">

            <!-- Basic Information -->
            <div class="border-b border-gray-200 pb-6">
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">Basic Information</h2>
                </header>

                <!-- University -->
                <x-input-label for="university" :value="__('University')" />
                <x-text-input 
                    id="university" 
                    name="university" 
                    type="text" 
                    class="mt-1 block w-full"
                    autofocus 
                />
                <x-input-error class="mt-2" :messages="$errors->get('university')" />

                <!-- Year of Study -->
                <x-input-label for="year_of_study" :value="__('Year of Study')" />
                <x-text-input 
                    id="year_of_study"
                    name="year_of_study"
                    type="number"
                    min="0"
                    class="mt-1 block w-full" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('year_of_study')" />

                <!-- Field of Study -->
                <x-input-label for="field_of_study" :value="__('Field of Study')" />
                <x-text-input 
                    id="field_of_study" 
                    name="field_of_study" 
                    type="text" 
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('field_of_study')" />

                <!-- Phone Number -->
                <x-input-label for="phoneNumber" :value="__('Phone Number')" />
                <x-text-input 
                    id="phoneNumber" 
                    name="phoneNumber" 
                    type="tel" 
                    class="mt-1 block w-full"
                />
                <x-input-error class="mt-2" :messages="$errors->get('phoneNumber')" />

                <!-- Location -->
                <x-input-label for="location" :value="__('Location')" />
                <x-text-input 
                    id="location" 
                    name="location"
                    type="text" 
                    class="mt-1 block w-full"
                    placeholder="Search for a location..." 
                />
                <x-input-error class="mt-2" :messages="$errors->get('location')" />
            </div>

            <!-- Skills -->
            <div class="border-b border-gray-200 pb-6">
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">Skills and Interests</h2>
                </header>

                <div class="space-y-4">
                    <div>
                        <x-input-label for="skills" :value="__('Skills')" />
                        <livewire:skills-input />
                    </div>

                    <div>
                        <x-input-label for="interests" :value="__('Interests')" />
                        <livewire:interests-input />
                    </div>
                </div>
            </div>

            <!-- Experiences -->
            <div class="border-b border-gray-200 pb-6">
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">Experiences</h2>
                </header>

                <livewire:student-experience-input />
            </div>

            <!-- Availability -->
            <div class="border-b border-gray-200 pb-6">
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">Availability</h2>
                </header>

                <div class="space-y-2">
                    <x-input-label for="availability" :value="__('Availability')" />
                    <select
                        id="availability"
                        name="availability"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    >
                        <option value="">Select availability</option>
                        <option value="Remote" {{ old('availability', $user->availability ?? '') == 'Remote' ? 'selected' : '' }}>Remote</option>
                        <option value="On-site" {{ old('availability', $user->availability ?? '') == 'On-site' ? 'selected' : '' }}>On-site</option>
                        <option value="Hybrid" {{ old('availability', $user->availability ?? '') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('availability')" />
                </div>
            </div>

            <!-- Bio -->
            <div class="border-b border-gray-200 pb-6">
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">About You</h2>
                </header>

                <div class="space-y-2">
                    <x-input-label for="bio" :value="__('Bio')" />
                    <textarea 
                        id="bio"
                        name="bio"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                        rows="4"
                    >{{ old('bio', $user->bio ?? '') }}</textarea>

                    <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                </div>
            </div>

            <div class="flex items-center justify-left gap-4">
                <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
            </div>

        </div>
    </div>

</form>
