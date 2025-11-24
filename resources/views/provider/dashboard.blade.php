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

            {{-- Create New Post Button and Sort --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4 md:gap-0">
                <a 
                    href="{{ route('gigs.create') }}" 
                    class="inline-flex items-center px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors shadow-sm text-base"
                >
                    <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                    Create a New Post
                </a>
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
                            @forelse($gigs as $gig)
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
                                            {{ $gig->applications_count ?? 100 }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $gig->duration }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('gigs.applicants', $gig) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 text-sm font-semibold hover:underline">
                                                Applicants
                                            </a>
                                            <span class="text-gray-300 dark:text-gray-600">,</span>
                                            <a href="{{ route('gigs.show', $gig) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 text-sm font-semibold hover:underline">
                                                Post
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <i data-lucide="inbox" class="w-16 h-16 text-gray-300 dark:text-gray-600 mx-auto mb-4"></i>
                                    <p class="text-gray-500 dark:text-gray-400 text-lg font-semibold mb-1">No posts yet</p>
                                    <p class="text-gray-400 dark:text-gray-500 text-sm">Create your first gig post to get started</p>
                                </td>
                            </tr>
                            @endforelse
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

