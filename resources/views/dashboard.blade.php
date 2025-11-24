<x-dashboard-layout>
    @php
        $user = Auth::user();
    @endphp

    {{-- Greeting --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
            Hi, {{ $user?->name ?? 'Angela' }} 👋
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm leading-relaxed">
            Please use the search bar to look up suitable gigs and jobs that might interest you. Once you find a gig, contact the business for shortlisting and further details.<br>
            All the best in your search!
        </p>
    </div>

    {{-- Search Bar with Filter --}}
    <div class="mb-6">
        <form method="GET" action="{{ route('dashboard') }}" class="flex gap-3">
            {{-- Filter Button --}}
            <button type="button" class="px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <i data-lucide="filter" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
            </button>

            {{-- Search Input --}}
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-lucide="menu" class="w-5 h-5 text-gray-400"></i>
                </div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search', 'Design') }}"
                    placeholder="Search for jobs..."
                    class="w-full pl-10 pr-10 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <i data-lucide="search" class="w-5 h-5 text-gray-400"></i>
                </button>
            </div>
        </form>
    </div>

    {{-- Jobs Count and Sort --}}
    <div class="flex items-center justify-between mb-4">
        <div class="text-gray-600 dark:text-gray-400">
            <span class="font-semibold text-gray-900 dark:text-gray-100">80</span> Jobs Found
        </div>
        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
            <span>Sort by:</span>
            <select class="bg-transparent border-none font-medium text-gray-900 dark:text-gray-100 focus:outline-none cursor-pointer">
                <option>Newest Post</option>
                <option>Oldest Post</option>
                <option>Salary: High to Low</option>
                <option>Salary: Low to High</option>
            </select>
        </div>
    </div>

    {{-- Job Cards Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $jobs = [
                [
                    'title' => 'Senior Producrt Designer - Growth',
                    'company' => 'Agensimo',
                    'location' => 'Kabul, New Afghanistan',
                    'level' => 'Mid-Senior',
                    'type' => 'Full-Time',
                    'salary' => '$11520 PA',
                    'logo_bg' => 'bg-blue-600',
                    'logo_text' => 'Ps',
                    'tags' => ['Design', 'Senior', 'User Experience'],
                    'date' => '28 March 2021'
                ],
                [
                    'title' => 'experienced market research analyst',
                    'company' => 'Mdogo',
                    'location' => 'Addis Ababa, Ethiopia',
                    'level' => 'Mid-Senior',
                    'type' => 'Full-Time',
                    'salary' => '$10000 PA',
                    'logo_bg' => 'bg-purple-900',
                    'logo_text' => 'Xd',
                    'tags' => ['Design', 'Senior', 'User Experience'],
                    'date' => '28 March 2021'
                ],
                [
                    'title' => 'Pega Decisioning/Marketing Developer',
                    'company' => 'Mozsambique',
                    'location' => 'Maputo, Mozambique',
                    'level' => 'Mid-Senior',
                    'type' => 'Full-Time',
                    'salary' => '$5200 PA',
                    'logo_bg' => 'bg-orange-600',
                    'logo_text' => 'Ai',
                    'tags' => ['Design', 'Senior', 'User Experience'],
                    'date' => '28 March 2021'
                ],
                [
                    'title' => 'Relationship Manager',
                    'company' => 'Agensimo',
                    'location' => 'Kabul, New Afghanistan',
                    'level' => 'Mid-Senior',
                    'type' => 'Full-Time',
                    'salary' => '$11520 PA',
                    'logo_bg' => 'bg-indigo-600',
                    'logo_text' => 'Ae',
                    'tags' => ['Design', 'Senior', 'User Experience'],
                    'date' => '28 March 2021'
                ],
                [
                    'title' => 'Opening For Relationship Associate - Bancassurance',
                    'company' => 'Mdogo',
                    'location' => 'Addis Ababa, Ethiopia',
                    'level' => 'Mid-Senior',
                    'type' => 'Full-Time',
                    'salary' => '$10000 PA',
                    'logo_bg' => 'bg-blue-500',
                    'logo_text' => 'Xd',
                    'tags' => ['Design', 'Senior', 'User Experience'],
                    'date' => '28 March 2021',
                    'badge' => 'Virtual'
                ],
                [
                    'title' => 'Job Opportunity For Sales Professionals...',
                    'company' => 'Mozsambique',
                    'location' => 'Maputo, Mozambique',
                    'level' => 'Mid-Senior',
                    'type' => 'Full-Time',
                    'salary' => '$5200 PA',
                    'logo_bg' => 'bg-teal-500',
                    'logo_text' => 'S',
                    'tags' => ['Design', 'Senior', 'User Experience'],
                    'date' => '28 March 2021'
                ],
            ];
        @endphp

        @foreach($jobs as $job)
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5 hover:shadow-lg transition">
            {{-- Header --}}
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-start gap-3">
                    <div class="{{ $job['logo_bg'] }} w-12 h-12 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                        {{ $job['logo_text'] }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 leading-tight mb-1">
                            {{ $job['title'] }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $job['company'] }}</p>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i data-lucide="more-vertical" class="w-5 h-5"></i>
                </button>
            </div>

            {{-- Location --}}
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-3">
                {{ $job['location'] }}
            </div>

            {{-- Job Details --}}
            <div class="flex items-center gap-4 mb-4 text-sm">
                <span class="text-gray-700 dark:text-gray-300">{{ $job['level'] }}</span>
                <span class="text-gray-700 dark:text-gray-300">{{ $job['type'] }}</span>
                <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $job['salary'] }}</span>
            </div>

            @if(isset($job['badge']))
            <div class="mb-4">
                <span class="inline-block px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs font-medium rounded-full">
                    {{ $job['badge'] }}
                </span>
            </div>
            @endif

            {{-- Description --}}
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal...
            </p>

            {{-- Tags --}}
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($job['tags'] as $tag)
                <span class="text-xs text-indigo-600 dark:text-indigo-400"># {{ $tag }}</span>
                @endforeach
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $job['date'] }}</span>
                <div class="flex items-center gap-2">
                    <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                        <i data-lucide="share-2" class="w-4 h-4 text-gray-400"></i>
                    </button>
                    <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                        <i data-lucide="bookmark" class="w-4 h-4 text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</x-dashboard-layout>
