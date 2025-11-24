<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />
        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10 max-w-5xl mx-auto">
                <h2 class="text-2xl font-bold mb-8 text-gray-800 dark:text-gray-100">Saved Jobs</h2>

                <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Job Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Due Date</th>
                                <th class="px-6 py-3"></th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($savedGigs as $gig)
                                    @php
                                        $isClosed = isset($gig->status) ? strtolower($gig->status) === 'closed' : false;
                                    @endphp
                                    <tr class="{{ $isClosed ? 'bg-red-100 dark:bg-red-900/40 hover:bg-red-200 dark:hover:bg-red-900/60' : 'hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $gig->title ?? 'Untitled' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm {{ $isClosed ? 'text-red-700 dark:text-red-300 font-semibold rounded' : '' }}">
                                            {{ ucfirst($gig->status ?? 'Open') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $gig->application_deadline ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if($isClosed)
                                                <button class="px-3 py-1 bg-gray-300 dark:bg-gray-700 text-gray-400 dark:text-gray-500 rounded-lg text-sm cursor-not-allowed opacity-60" disabled>Apply</button>
                                            @else
                                                <a href="{{ route('gigs.show', $gig->id) }}" class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">Apply</a>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="{{ route('gigs.unsave', $gig->id) }}" method="POST" onsubmit="return confirm('Remove this saved job?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 text-red-600 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">No saved jobs found.</td>
                                    </tr>
                                @endforelse


                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>