<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />
        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10 max-w-5xl mx-auto">
                <h2 class="text-2xl font-bold mb-8 text-gray-800 dark:text-gray-100">My Gig Posts</h2>
                <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Job Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Deadline</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Applicants</th>
                                <th class="px-6 py-3"></th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($gigs as $gig)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        <a href={{ route('gigs.show', $gig) }}>
                                            {{ $gig->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $gig->status ?? 'Open' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $gig->application_deadline }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-indigo-600 dark:text-indigo-400">{{ $gig->applications_count }}</td>
                                    

                                    @if($gig->status == "open")
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="{{ route('gigs.close', $gig) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg text-sm transition">Close</button>
                                            </form>
                                        </td>
                                    @else 
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg text-sm transition">Closed</button>
                                        </td>
                                    @endif

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="px-3 py-1 text-red-600 hover:underline" onclick="return confirm('Delete this gig?')">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>