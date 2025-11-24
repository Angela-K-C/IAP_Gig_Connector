@if (session('status'))
    <p class="text-red-600">{{ session('status') }}</p>
@endif

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Other profile information (for providers) -->
        @if (auth()->user()->isProvider())
            <!-- Organization Name -->
            <div>
                <x-input-label for="organization_name" :value="__('Organization Name')" />
                <x-text-input id="organization_name" name="organization_name" type="text" class="mt-1 block w-full" :value="old('organization_name', $user->provider->organization_name)" required autofocus autocomplete="organization_name" />
                <x-input-error class="mt-2" :messages="$errors->get('organization_name')" />
            </div>

            <!-- Contact Number -->
            <div>
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" name="contact_number" type="tel" class="mt-1 block w-full" :value="old('contact_number', $user->provider->contact_number)" required autofocus autocomplete="contact_number" />
                <x-input-error class="mt-2" :messages="$errors->get('contact_number')" />
            </div>

            <!-- About -->
            <div>
                <x-input-label for="about_provider" :value="__('About Us')" />
                <textarea 
                    id="about_provider"
                    name="about_provider"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    rows="4"
                >{{ old('about_provider', $user->provider->about_provider) }}</textarea>

                <x-input-error class="mt-2" :messages="$errors->get('about_provider')" />
            </div>
        @endif

        <!-- Other profile information (for students) -->
        @if (auth()->user()->isStudent())
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
                            :value="old('university', $user->studentProfile->university)"
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
                            :value="old('year_of_study', $user->studentProfile->year_of_study)"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('year_of_study')" />

                        <!-- Field of Study -->
                        <x-input-label for="field_of_study" :value="__('Field of Study')" />
                        <x-text-input 
                            id="field_of_study" 
                            name="field_of_study" 
                            type="text" 
                            class="mt-1 block w-full"
                            :value="old('field_of_study', $user->studentProfile->field_of_study)"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('field_of_study')" />

                        <!-- Phone Number -->
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <x-text-input 
                            id="phone_number" 
                            name="phone_number" 
                            type="tel" 
                            class="mt-1 block w-full"
                            :value="old('phone_number', $user->studentProfile->phone_number)"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />

                        <!-- Location -->
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input 
                            id="location" 
                            name="location"
                            type="text" 
                            class="mt-1 block w-full"
                            placeholder="Search for a location..." 
                            :value="old('location', $user->studentProfile->location)"
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
                                <livewire:skills-input :initial-skills="$user->studentProfile->skills ?? []" />
                            </div>

                            <div>
                                <x-input-label for="interests" :value="__('Interests')" />
                                <livewire:interests-input :initial-interests="$user->studentProfile->interests ?? []" />
                            </div>
                        </div>
                    </div>

                    <!-- Experiences -->
                    <div class="border-b border-gray-200 pb-6">
                        <header class="mb-4">
                            <h2 class="text-lg font-medium text-gray-900">Experiences</h2>
                        </header>

                        <livewire:student-experience-input :initial-experiences="$user->studentProfile->experiences ?? []"  />
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
                                <option value="Remote" {{ old('availability', $user->studentProfile->availability ?? '') == 'remote' ? 'selected' : '' }}>Remote</option>
                                <option value="On-site" {{ old('availability', $user->studentProfile->availability ?? '') == 'on-site' ? 'selected' : '' }}>On-site</option>
                                <option value="Hybrid" {{ old('availability', $user->studentProfile->availability ?? '') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
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
                            >{{ old('bio', $user->studentProfile->bio ?? '') }}</textarea>

                            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                        </div>
                    </div>

                    <!-- CV -->
                    <div class="mt-4">
                        <x-input-label for="cv_path" :value="__('Upload CV')" />
                        <input type="file" name="cv_path" id="cv_path" class="mt-1 block w-full border rounded" />
                        <x-input-error :messages="$errors->get('cv_path')" class="mt-2" />

                        @if ($user->studentProfile->cv_path)
                            <p class="mt-2">
                                Current CV: 
                                <a href="{{ asset('storage/' . $user->studentProfile->cv_path) }}" target="_blank" class="underline text-blue-600">Download</a>
                            </p>
                        @endif
                    </div>

                    <div class="mt-4">
                        @if($user->studentProfile->cv_path)
                            <a href="{{ asset('storage/' . $user->studentProfile->cv_path) }}" 
                            class="px-4 py-2 bg-gray-600 text-white rounded" 
                            download>
                            Download CV
                            </a>

                            <button id="previewBtn" type="button" class="px-4 py-2 bg-blue-600 text-white rounded ml-2">
                                Preview CV
                            </button>

                            <!-- Preview iframe (hidden by default) -->
                            <div id="cvPreviewContainer" style="display:none; margin-top:16px;">
                                <iframe 
                                    src="{{ asset('storage/' . $user->studentProfile->cv_path) }}" 
                                    width="100%" 
                                    height="600px"
                                ></iframe>
                            </div>
                        @else
                            <p class="text-gray-500">No CV uploaded.</p>
                        @endif
                    </div>

                </div>
            </div>
        @endif


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const previewBtn = document.getElementById('previewBtn');
        const previewContainer = document.getElementById('cvPreviewContainer');
        const previewIframe = document.getElementById('cvPreviewIframe');

        previewBtn.addEventListener('click', function () {
            // Toggle visibility
            if (previewContainer.style.display === 'none') {
                previewContainer.style.display = 'block';
            } else {
                previewContainer.style.display = 'none';
                previewIframe.src = ''; // reset iframe to stop loading
            }
        });
    });
</script>
