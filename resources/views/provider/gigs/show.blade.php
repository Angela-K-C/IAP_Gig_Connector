{{-- resources/views/provider/gigs/show.blade.php --}}
@php
$gig = (object)[
    'title' => 'Senior Frontend Developer',
    'company' => 'Acme Corp',
    'job_title' => 'Senior Frontend Developer',
    'pay_rate' => 'KES 1000/hr',
    'duration' => '3 months',
    'working_hours' => '40 hours/week',
    'type' => 'Remote',
    'location' => 'Nairobi, Kenya',
    'skills' => ['Vue.js', 'Tailwind CSS', 'JavaScript', 'PHP', 'Laravel'],
    'description' => "We are looking for a senior frontend developer to join our team. \nResponsibilities include building responsive UIs and collaborating with the backend team.",
    'contact_email' => 'hr@acme.com',
    'contact_phone' => '+254711123456',
    'status' => 'active',
    'deadline' => \Carbon\Carbon::parse('2025-12-31'),
    'applications_count' => 12,
];
@endphp

<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />
        
        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10">
                
                {{-- Main Content Card with Blue Border --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg border-4 border-indigo-500 shadow-lg">
                    
                    {{-- Header --}}
                    <div class="border-b-2 border-indigo-500 p-6">
                        <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mb-4">
                            Job Post Details
                        </h1>
                        
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">
                            {{ $gig->title ?? 'Opening For Relationship Associate - Bancassurance' }}
                        </h2>

                        {{-- Action Tabs --}}
                        <div class="flex gap-2">
                            <a href="{{ route('provider.gigs.edit', $gig->id ?? '#') }}" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors shadow-sm">
                                Edit
                            </a>
                            <form action="{{ route('provider.gigs.close', $gig->id ?? '#') }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-6 py-2.5 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-lg border border-gray-300 dark:border-gray-600 transition-colors">
                                    Close Applications
                                </button>
                            </form>
                            <a href="{{ route('provider.gigs.applicants', $gig->id ?? '#') }}" class="px-6 py-2.5 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-lg border border-gray-300 dark:border-gray-600 transition-colors">
                                Applicant Details
                            </a>
                        </div>
                    </div>

                    {{-- Dotted Divider --}}
                    <div class="border-b-2 border-dashed border-gray-300 dark:border-gray-600"></div>

                    {{-- Content Area --}}
                    <div class="p-8">
                        
                        {{-- Main Content Grid --}}
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
                            
                            {{-- General Details --}}
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6">General Details</h3>
                                
                                <div class="space-y-3">
                                    <div class="flex">
                                        <span class="text-gray-700 dark:text-gray-400 font-medium min-w-[140px]">Job Title:</span>
                                        <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                            {{ $gig->job_title ?? $gig->title ?? 'Relationship Associate - Bancassurance' }}
                                        </span>
                                    </div>

                                    <div class="flex">
                                        <span class="text-gray-700 dark:text-gray-400 font-medium min-w-[140px]">Provider Name:</span>
                                        <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                            {{ $gig->company ?? 'Company X' }}
                                        </span>
                                    </div>

                                    <div class="flex">
                                        <span class="text-gray-700 dark:text-gray-400 font-medium min-w-[140px]">Pay rate:</span>
                                        <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                            {{ $gig->pay_rate ?? '500ksh per hour' }}
                                        </span>
                                    </div>

                                    <div class="flex">
                                        <span class="text-gray-700 dark:text-gray-400 font-medium min-w-[140px]">Duration:</span>
                                        <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                            {{ $gig->duration ?? '2 months' }}
                                        </span>
                                    </div>

                                    <div class="flex">
                                        <span class="text-gray-700 dark:text-gray-400 font-medium min-w-[140px]">Working hours:</span>
                                        <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                            {{ $gig->working_hours ?? '2 months' }}
                                        </span>
                                    </div>

                                    <div class="flex">
                                        <span class="text-gray-700 dark:text-gray-400 font-medium min-w-[140px]">Type:</span>
                                        <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                            {{ $gig->type ?? 'Remote' }}
                                        </span>
                                    </div>

                                    <div class="flex">
                                        <span class="text-gray-700 dark:text-gray-400 font-medium min-w-[140px]">Location:</span>
                                        <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                            {{ $gig->location ?? 'To be Communicated' }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- Required Skills --}}
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6">Required Skills</h3>
                                
                                <ul class="space-y-2">
                                    @php
                                        $skills = $gig->skills ?? ['Communication', 'Computer Literacy', 'R programming language', 'Microsoft Office Suite'];
                                        if (is_string($skills)) {
                                            $skills = json_decode($skills, true) ?? explode(',', $skills);
                                        }
                                    @endphp
                                    @forelse($skills as $skill)
                                    <li class="flex items-start text-gray-700 dark:text-gray-300">
                                        <span class="text-gray-400 mr-3">•</span>
                                        <span>{{ trim($skill) }}</span>
                                    </li>
                                    @empty
                                    <li class="text-gray-500 dark:text-gray-400">No specific skills required</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        {{-- Job Description --}}
                        <div class="mb-10">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Job Description</h3>
                            
                            <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                @if(isset($gig->description))
                                    <p class="whitespace-pre-line">{{ $gig->description }}</p>
                                @else
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus, arcu sed dictum pharetra, enim lorem egestas risus, sit amet luctus dui lorem vitae justo. 
                                        Vestibulum porttitor, tellus lobortis aliquam gravida, leo sapien dictum quam, quis pellentesque elit libero eu justo. Sed dictum, tortor a malesuada placerat, velit mauris 
                                        nisi, velit imperdiet laoreet. Nunc at mollis interdum. Mauris et purus diam, condimentum laoreet. Diam facilisis nunc a egestas fringilla, tellus imperdiet sem lorem euismod magna.
                                    </p>
                                    <p>
                                        Donec imperdiet, dolor non varius condimentum, nulla hendrerit. Duis at dui non elit tristique laoreet, aliquet non arcu nisi, suscipit metus ante. Etiam turpis porta, tellus imperdiet sem et massa. Fusce placerat urna urna 
                                        ullamcorper eu, euismod et ante. Phasellus convallis consectetur nisl vitae sodales. Donec laoreet id ante vitae eleifend. Pellentesque quis quam arcu. Quisque laoreet sem 
                                        massa, in consectetur elit vehicula et. Aliquam.
                                    </p>
                                @endif
                            </div>
                        </div>

                        {{-- Contact Details --}}
                        <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Contact Details</h3>
                            
                            <div class="flex flex-wrap gap-6">
                                <div class="flex items-center text-gray-700 dark:text-gray-300">
                                    <i data-lucide="mail" class="w-5 h-5 mr-2 text-gray-500"></i>
                                    <span>{{ $gig->contact_email ?? 'companyx@gmail.com' }}</span>
                                </div>

                                <div class="flex items-center text-gray-700 dark:text-gray-300">
                                    <i data-lucide="phone" class="w-5 h-5 mr-2 text-gray-500"></i>
                                    <span>{{ $gig->contact_phone ?? '+254111111111' }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Stats Cards Below (Optional) --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total Applications</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $gig->applications_count ?? 0 }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center">
                                <i data-lucide="users" class="w-6 h-6 text-indigo-600 dark:text-indigo-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Status</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-gray-100">
                                    @if(($gig->status ?? 'active') === 'active')
                                        <span class="text-green-600 dark:text-green-400">Active</span>
                                    @else
                                        <span class="text-red-600 dark:text-red-400">Closed</span>
                                    @endif
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                <i data-lucide="check-circle" class="w-6 h-6 text-green-600 dark:text-green-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Deadline</p>
                                <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                    {{ isset($gig->deadline) ? $gig->deadline->format('M d, Y') : 'No deadline' }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                                <i data-lucide="calendar" class="w-6 h-6 text-orange-600 dark:text-orange-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</x-app-layout>
