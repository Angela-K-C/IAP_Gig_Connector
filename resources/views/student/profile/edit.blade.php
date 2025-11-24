{{-- resources/views/student/profile/edit.blade.php --}}

<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />
        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10 max-w-4xl mx-auto">

                {{-- Header --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">Edit Personal Profile</h1>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                        Update your details and let job providers know more about you.
                    </p>
                </div>

                <form method="POST" action="{{ route('student.profile.update') }}" class="space-y-8" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- 1. Personal Information --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">1. Personal Information</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Phone Number</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('phone')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Location</label>
                                <input type="text" id="location" name="location" value="{{ old('location', $user->location) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('location')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="university" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">University</label>
                                <input type="text" id="university" name="university" value="{{ old('university', $user->studentProfile?->university) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div>
                                <label for="year_of_study" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Year of Study</label>
                                <input type="text" id="year_of_study" name="year_of_study" value="{{ old('year_of_study', $user->studentProfile?->year_of_study) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div>
                                <label for="field_of_study" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Field of Study</label>
                                <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study', $user->studentProfile?->field_of_study) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>
                        </div>
                    </div>

                    {{-- 2. Skills and Interests --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">2. Skills and Interests</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="skills" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Skills (comma separated)</label>
                                <input type="text" id="skills" name="skills" 
                                    value="{{ old('skills', $user->studentProfile?->skills ? implode(',', json_decode($user->studentProfile->skills)) : '') }}" 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('skills')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="interests" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Interests</label>
                                <input type="text" id="interests" name="interests" value="{{ old('interests', $user->studentProfile?->interests ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('interests')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="portfolio_link" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Portfolio Link</label>
                                <input type="url" id="portfolio_link" name="portfolio_link" value="{{ old('portfolio_link', $user->studentProfile?->portfolio_link ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>
                        </div>
                    </div>

                    {{-- 3. Experience --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">3. Experience</h2>
                        <div class="space-y-4">
                            <label for="experience" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Describe your past roles, internships, etc.</label>
                            <textarea id="experience" name="experience" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400">{{ old('experience', $user->studentProfile?->experience ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- 4. Bio / About --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">4. About You</h2>
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Description</label>
                            <textarea id="bio" name="bio" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400">{{ old('bio', $user->studentProfile?->bio ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- 5. Availability --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">5. Availability</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <input type="checkbox" id="availability_remote" name="availability_remote" value="1" {{ old('availability_remote', $user->studentProfile?->availability_remote) ? 'checked' : '' }}>
                                <label for="availability_remote" class="text-sm font-medium text-gray-900 dark:text-gray-100">Remote work</label>
                            </div>

                            <div class="flex items-center space-x-4">
                                <input type="checkbox" id="availability_physical" name="availability_physical" value="1" {{ old('availability_physical', $user->studentProfile?->availability_physical) ? 'checked' : '' }}>
                                <label for="availability_physical" class="text-sm font-medium text-gray-900 dark:text-gray-100">Physical jobs</label>
                            </div>

                            <div>
                                <label for="preferred_hours" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Preferred work times</label>
                                <select id="preferred_hours" name="preferred_hours" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option value="">Select...</option>
                                    <option value="weekdays" {{ old('preferred_hours', $user->studentProfile?->preferred_hours) == 'weekdays' ? 'selected' : '' }}>Weekdays</option>
                                    <option value="weekends" {{ old('preferred_hours', $user->studentProfile?->preferred_hours) == 'weekends' ? 'selected' : '' }}>Weekends</option>
                                    <option value="evenings" {{ old('preferred_hours', $user->studentProfile?->preferred_hours) == 'evenings' ? 'selected' : '' }}>Evenings</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- 6. CV Upload --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">6. CV Upload (optional)</h2>
                        <div>
                            @if($user->studentProfile?->cv_path)
                                <a href="{{ Storage::url($user->studentProfile->cv_path) }}" target="_blank" class="text-indigo-600 dark:text-indigo-400 hover:underline">View uploaded CV</a>
                            @endif
                            <input type="file" name="cv_path" class="mt-2">
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-semibold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                            Update Profile
                        </button>
                    </div>
                </form>

            </main>
        </div>
    </div>
</x-app-layout>
