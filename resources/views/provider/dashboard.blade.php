{{-- resources/views/provider/dashboard.blade.php --}}

<div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
    <x-navigation.sidebar-nav />
    
    <div class="flex-1 overflow-auto">
        <x-dashboard-layout>
            {{-- Provider-specific message --}}
            <div class="mb-8">
                <p class="text-lg text-indigo-700 dark:text-indigo-400 font-semibold">
                    Here you can manage your gigs, view applications, and connect with students.
                </p>
            </div>

            {{-- Search Bar with Filter --}}
            <div class="mb-6 flex gap-3">
                {{-- Filter Button --}}
                <button 
                    type="button" 
                    onclick="toggleFilters()"
                    class="px-4 h-12 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition flex items-center justify-center flex-shrink-0"
                >
                    <i data-lucide="filter" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                </button>

                {{-- Search Form --}}
                <form method="GET" action="{{ route('dashboard') }}" class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-lucide="menu" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search', 'Design') }}"
                            placeholder="Search your posts..."
                            class="w-full h-12 pl-12 pr-12 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        >
                        <button type="submit" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <i data-lucide="search" class="w-5 h-5 text-gray-400"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Filter Dropdown (Hidden by default) --}}
            <div id="filtersPanel" class="hidden mb-8 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">Filters</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="text-sm text-gray-600 dark:text-gray-400 mb-2 block font-medium">Status</label>
                        <select class="w-full px-4 py-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>All</option>
                            <option>Open</option>
                            <option>Closed</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600 dark:text-gray-400 mb-2 block font-medium">Date Range</label>
                        <select class="w-full px-4 py-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>All Time</option>
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>Last 90 Days</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600 dark:text-gray-400 mb-2 block font-medium">Applications</label>
                        <select class="w-full px-4 py-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Any</option>
                            <option>0-50</option>
                            <option>51-100</option>
                            <option>100+</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Create New Post Button and Sort --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4 md:gap-0">
                <a 
                    href="{{ route('gigs.create') }}" 
                    class="inline-flex items-center px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors shadow-sm text-base"
                >
                    <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                    Create a New Post
                </a>

                <div class="flex items-center gap-3 md:ml-8">
                    <label for="sort" class="text-sm text-gray-600 dark:text-gray-400 font-medium">Sort by:</label>
                    <select 
                        id="sort" 
                        name="sort" 
                        onchange="this.form?.submit()"
                        class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 min-w-[180px]"
                    >
                        <option value="newest">Newest Post</option>
                        <option value="oldest">Oldest Post</option>
                        <option value="most_applications">Most Applications</option>
                        <option value="least_applications">Least Applications</option>
                    </select>
                </div>
            </div>

            {{-- Posted Jobs Table --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-600">
                            <tr>
                                <th class="px-8 py-5 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Posted Jobs</th>
                                <th class="px-8 py-5 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-8 py-5 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Application Counts</th>
                                <th class="px-8 py-5 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Duration</th>
                                <th class="px-8 py-5 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($gigs ?? [] as $gig)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
                                    <td class="px-8 py-5">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $gig->title ?? 'Tutor Math' }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        @if(($gig->status ?? 'open') === 'open')
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                                Open
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                                                Closed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="text-sm text-gray-900 dark:text-gray-100 font-semibold">
                                            {{ count($gig->applications) }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $post->start_date ?? '12/08' }} - {{ $post->end_date ?? '21/09/2025' }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('gigs.applications', $post->id ?? '#') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 text-sm font-semibold hover:underline">
                                                Applicants
                                            </a>
                                            <span class="text-gray-300 dark:text-gray-600">,</span>
                                            <a href="{{ route('gigs.show', $post->id ?? '#') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 text-sm font-semibold hover:underline">
                                                Post
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <i data-lucide="inbox" class="w-16 h-16 text-gray-300 dark:text-gray-600 mx-auto mb-4"></i>
                                    <p class="text-gray-500 dark:text-gray-400 text-lg font-semibold mb-1">No posts yet</p>
                                    <p class="text-gray-400 dark:text-gray-500 text-sm">Create your first gig post to get started</p>
                                </td>
                            </tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Pagination --}}
            @if(isset($posts) && $posts->hasPages())
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
            @endif

        </x-dashboard-layout>
    </div>
</div>

<script>
function toggleFilters() {
    const panel = document.getElementById('filtersPanel');
    panel.classList.toggle('hidden');
}
</script>

