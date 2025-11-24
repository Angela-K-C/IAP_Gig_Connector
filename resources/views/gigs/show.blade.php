{{-- resources/views/gigs/show.blade.php --}}

<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />
        
        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10 max-w-5xl">
            
                {{-- Header --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-indigo-700 dark:text-indigo-400 mb-6">Job Details</h1>
                    
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">
                        {{ $gig->title ?? 'Opening For Relationship Associate - Bancassurance' }}
                    </h2>

                    {{-- Action Buttons --}}
                    
                    <div class="flex gap-3">
                        @if($hasApplied)
                            <button class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors shadow-sm">
                                APPLIED
                            </button>
                        @else
                            <form action="{{ route('applications.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="job_id" value={{ $gig->id }} />
                                <button class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors shadow-sm">
                                    Apply
                                </button>
                            </form>
                        @endif


                        @if(auth()->user()->savedGigs->contains($gig->id))
                            <form action="{{ route('gigs.unsave', $gig->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="px-8 py-3 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-lg border border-gray-300 dark:border-gray-600 transition-colors">
                                    Remove From Saved
                                </button>
                            </form>
                        @else
                            <form action="{{ route('gigs.save', $gig->id) }}" method="POST">
                                @csrf
                                <button class="px-8 py-3 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-lg border border-gray-300 dark:border-gray-600 transition-colors">
                                    Save for Later
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                {{-- Main Content Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
                    
                    {{-- General Details --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6">General Details</h3>
                        
                        <div class="space-y-4">
                            <div class="flex">
                                <span class="text-gray-700 dark:text-gray-300 font-medium min-w-[140px]">Job Title:</span>
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $gig->title }}
                                </span>
                            </div>

                            <div class="flex">
                                <span class="text-gray-700 dark:text-gray-300 font-medium min-w-[140px]">Provider Name:</span>
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $gig->provider->organization_name }}
                                </span>
                            </div>

                            <div class="flex">
                                <span class="text-gray-700 dark:text-gray-300 font-medium min-w-[140px]">Pay rate:</span>
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $gig->payment_amount }} @if($gig->payment_type == "fixed") (fixed) @else /hr @endif 
                                </span>
                            </div>

                            <div class="flex">
                                <span class="text-gray-700 dark:text-gray-300 font-medium min-w-[140px]">Duration:</span>
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $gig->duration }}
                                </span>
                            </div>

                            <div class="flex">
                                <span class="text-gray-700 dark:text-gray-300 font-medium min-w-[140px]">Location:</span>
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $gig->location }}
                                </span>
                            </div>

                            <div class="flex">
                                <span class="text-gray-700 dark:text-gray-300 font-medium min-w-[140px]">Category</span>
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    {{ $gig->category->name }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Required Skills --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6">Required Skills</h3>
                        
                        <ul class="space-y-3">
                            @forelse(($gig->skills ?? ['Communication', 'Computer Literacy', 'R programming language', 'Microsoft Office Suite']) as $skill)
                            <li class="flex items-start">
                                <span class="text-gray-400 mr-3">•</span>
                                <span class="text-gray-700 dark:text-gray-300">{{ $skill }}</span>
                            </li>
                            @empty
                            <li class="text-gray-500 dark:text-gray-400">No specific skills required</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                {{-- Job Description --}}
                <div class="mb-12">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6">Job Description</h3>
                    
                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed space-y-4">
                        @if(isset($gig->description))
                            {!! nl2br(e($gig->description)) !!}
                        @endif
                    </div>
                </div>

                {{-- Contact Details --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6">Contact Details</h3>
                    
                    <div class="flex flex-wrap gap-6">
                        @if(isset($gig->contact_email) || true)
                        <a href="mailto:{{ $gig->provider->user->email }}" class="flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors">
                            <i data-lucide="mail" class="w-5 h-5 mr-2"></i>
                            <span>{{ $gig->provider->user->email }}</span>
                        </a>
                        @endif

                        @if(isset($gig->provider->contact_number) || true)
                        <a href="tel:{{ $gig->provider->contact_number }}" class="flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors">
                            <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                            <span>{{ $gig->provider->contact_number }}</span>
                        </a>
                        @endif
                    </div>
                </div>

            </main>
        </div>
    </div>
</x-app-layout>