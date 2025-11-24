<div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">

    {{-- Sticky Sidebar --}}
    <div class="sticky top-0 h-screen">
        <x-navigation.sidebar-nav />
    </div>

    {{-- Main Content --}}
    <div class="flex-1 overflow-auto px-6 py-4 lg:px-10"> 
        {{-- Reduced top padding from py-10 → py-4 --}}

        <x-dashboard-layout title="Provider Dashboard" user="Provider">

            {{-- Top Bar --}}
            <div class="flex flex-col gap-3 mb-4">
                {{-- Reduced mb-10 → mb-4 and gap-4 → gap-3 --}}

                {{-- Search Bar (full width) --}}
                <form method="GET" action="{{ route('dashboard') }}" class="w-full">
                    <x-forms.search-form />
                </form>

                {{-- Create Post Button (below search) --}}
                <x-ui.Button 
                    as="a" 
                    href="{{ route('gigs.create') }}"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition w-full md:w-auto"
                >
                    Create New Post
                </x-ui.Button>
            </div>

            {{-- Provider Message --}}
            <div class="mb-6">
                <div class="p-4 bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-200 dark:border-indigo-800 rounded-xl">
                    <p class="text-indigo-700 dark:text-indigo-300 font-semibold text-sm">
                        Manage your job postings and track applications from students.
                    </p>
                </div>
            </div>

            {{-- Jobs Table --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-900/40">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Job Name
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Duration
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Applications
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                        @forelse ($gigs as $gig)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                            {{-- Job Title --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ $gig->title }}
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    @if($gig->status === 'open')
                                        bg-green-100 text-green-700 dark:bg-green-700/30 dark:text-green-300
                                    @elseif($gig->status === 'closed')
                                        bg-red-100 text-red-700 dark:bg-red-700/30 dark:text-red-300
                                    @endif">
                                    {{ ucfirst($gig->status) }}
                                </span>
                            </td>

                            {{-- Duration --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                {{ $gig->duration ?? '-' }}
                            </td>

                            {{-- Applications --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                {{ $gig->applications_count ?? 0 }}
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-3">

                                <a href="{{ route('provider.gigs.applicants', $gig->id) }}"
                                   class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-xs shadow-sm transition">
                                    View Applicants
                                </a>

                                <a href="{{ route('provider.gigs.show', $gig->id) }}"
                                   class="px-3 py-1 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 
                                          text-gray-700 dark:text-gray-300 rounded-lg text-xs shadow-sm transition">
                                    View Post
                                </a>

                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400 text-sm">
                                No gigs found. Start by creating your first post!
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </x-dashboard-layout>

    </div>
</div>
