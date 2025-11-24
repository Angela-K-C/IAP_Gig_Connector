<div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">

    {{-- Sticky Sidebar --}}
    <div class="sticky top-0 h-screen">
        <x-navigation.sidebar-nav />
    </div>

    {{-- Main Content --}}
    <div class="flex-1 overflow-auto p-6 lg:p-10">

        <x-dashboard-layout title="Provider Dashboard" user="Provider">

            {{-- Top Bar: Search + Create Post --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                
                {{-- Search Bar --}}
                <form method="GET" action="{{ route('dashboard') }}" class="flex-1">
                    <x-forms.search-form />
                </form>

                {{-- Create Post Button --}}
                <a href="{{ route('gigs.create') }}" 
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition">
                    Create Post
                </a>
            </div>

            {{-- Provider Message --}}
            <div class="mb-6">
                <p class="text-lg text-indigo-700 dark:text-indigo-400 font-semibold">
                    Manage your job postings and track applications from students here.
                </p>
            </div>

            {{-- Jobs Table --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Job Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Duration</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Applications</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">

                        @forelse ($gigs as $gig)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ $gig->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $gig->status === 'open' ? 'bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-300' : '' }}
                                    {{ $gig->status === 'closed' ? 'bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-300' : '' }}">
                                    {{ ucfirst($gig->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $gig->duration ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $gig->applications_count ?? 0 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-2">
                                <a href="{{ route('provider.gigs.applicants', $gig->id) }}" 
                                   class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">
                                    View Applications
                                </a>
                                <a href="{{ route('provider.gigs.show', $gig->id) }}" 
                                   class="px-3 py-1 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg text-sm transition">
                                    View Post
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No gigs found. Create your first job post!
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </x-dashboard-layout>

    </div>
</div>
