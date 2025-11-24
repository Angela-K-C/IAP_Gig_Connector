{{-- resources/views/student/profile/show.blade.php --}}

<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />
        
        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10 max-w-5xl">
                
                {{-- Header --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">Personal Profile</h1>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                        This is what job providers see when you apply for positions. You will, however, be allowed to upload your CV as you apply for the job. This section is meant to allow job providers to get a quick overview of you before making any decisions, i.e shortlisting. Specific details, i.e names will be hidden to make the process anonymous and fair.
                    </p>
                    <a href="{{ route('student.profile.edit') }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-medium text-sm">
                        <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i>
                        Edit Profile
                    </a>
                </div>

                {{-- Main Content --}}
                <div class="space-y-8">
                    
                    {{-- 1. Personal Information --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">1. Personal Information</h2>
                        
                        <div class="space-y-4">
                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[150px]">Full name:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->name ?? 'Angela Chepngeno Kosgei' }}</span>
                            </div>

                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[150px]">University:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->university ?? 'Strathmore University' }}</span>
                            </div>

                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[150px]">Year of Study:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->year_of_study ?? '2nd year' }}</span>
                            </div>

                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[150px]">Field of Study:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->field_of_study ?? 'Computer Science' }}</span>
                            </div>

                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[150px]">Phone Number:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->phone ?? '+254111111123' }}</span>
                            </div>

                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[150px]">Location:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->location ?? 'Nairobi, Kenya' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Skills and Interests --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">2. Skills and Interests</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-2">Skills:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">
                                    {{ $user->skills ?? 'Tutoring, Graphic Design, Data Entry' }}
                                </span>
                            </div>

                            <div>
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-2">Interests:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">
                                    {{ $user->interests ?? 'Creative gigs, Tech gigs, Academic Help' }}
                                </span>
                            </div>

                            @if($user->portfolio_link)
                            <div>
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-2">Uploads and links:</span>
                                <a href="{{ $user->portfolio_link }}" target="_blank" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                                    {{ $user->portfolio_link ?? 'Github.com' }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- 3. Experience --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">3. Experience</h2>
                        
                        @if($user->experiences && count($user->experiences) > 0)
                            @foreach($user->experiences as $experience)
                            <div class="mb-6 last:mb-0">
                                <div class="space-y-3">
                                    <div>
                                        <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-1">Experience:</span>
                                        <span class="text-sm text-gray-900 dark:text-gray-100">{{ $experience->status ?? 'Present' }}</span>
                                    </div>

                                    <div>
                                        <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-1">Description:</span>
                                        <span class="text-sm text-gray-900 dark:text-gray-100">{{ $experience->description ?? 'Worked as an assistant at ...' }}</span>
                                    </div>

                                    @if($experience->document_link)
                                    <div>
                                        <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-1">Uploads and links:</span>
                                        <a href="{{ $experience->document_link }}" target="_blank" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                                            uploads.docx
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="space-y-3">
                                <div>
                                    <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-1">Experience:</span>
                                    <span class="text-sm text-gray-900 dark:text-gray-100">Present</span>
                                </div>

                                <div>
                                    <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-1">Description:</span>
                                    <span class="text-sm text-gray-900 dark:text-gray-100">Worked as an assistant at ...</span>
                                </div>

                                <div>
                                    <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-1">Uploads and links:</span>
                                    <a href="#" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">uploads.docx</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- 4. Availability --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">4. Availability</h2>
                        
                        <div class="space-y-4">
                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[200px]">Remote work:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->remote_work ? 'Yes' : 'No' }}</span>
                            </div>

                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[200px]">Physical jobs:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->physical_jobs ? 'Yes' : 'No' }}</span>
                            </div>

                            <div class="flex">
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 min-w-[200px]">Preferred work times:</span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $user->preferred_work_times ?? 'Weekdays, Weekends, Evenings' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- 5. About You --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">5. About You</h2>
                        
                        <div>
                            <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-2">Description:</span>
                            <p class="text-sm text-gray-900 dark:text-gray-100 leading-relaxed">
                                {{ $user->bio ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus, arcu sed dictum pharetra, enim lorem egestas risus, sit amet luctus dui lorem vitae justo. Vestibulum porttitor, tellus lobortis aliquam gravida, leo sapien dictum quam, quis pellentesque elit libero eu justo.' }}
                            </p>
                        </div>
                    </div>

                    {{-- 6. CV Upload --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">6. CV Upload (optional)</h2>
                        
                        @if($user->cv_path)
                            <div>
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 block mb-2">Uploads and links:</span>
                                <a href="{{ Storage::url($user->cv_path) }}" target="_blank" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline flex items-center">
                                    <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                    uploads.docx
                                </a>
                            </div>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400">No CV uploaded yet</p>
                        @endif
                    </div>

                </div>

                

            </main>
        </div>
    </div>
</x-app-layout>

