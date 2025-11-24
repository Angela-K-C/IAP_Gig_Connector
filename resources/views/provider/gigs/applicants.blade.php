<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />

        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10 max-w-5xl mx-auto">

                <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">
                    Applications for: {{ $gig->title }}
                </h2>

                <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Applicant</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Applied On</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Profile</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">

                            @forelse($applications as $application)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">

                                    {{-- Student Name --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $application->student->user->name }}
                                    </td>

                                    {{-- Date --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($application->applied_at)->format('M j, Y') }}
                                    </td>

                                    {{-- View Student Profile --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a 
                                            href="#" 
                                            class="text-indigo-600 dark:text-indigo-400 hover:underline"
                                        >
                                            View Profile
                                        </a>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 rounded-lg text-xs font-semibold 
                                            @if($application->status === 'approved') bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300
                                            @elseif($application->status === 'rejected') bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300
                                            @else bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300
                                            @endif
                                        ">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>

                                    {{-- Approve / Reject / Shortlist --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-3">

                                        <form action="{{ route('applications.update', $application->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="status" value="shorlisted" />

                                            <button class="text-green-600 hover:text-green-800">
                                                Shortlist
                                            </button>
                                        </form>

                                        <form action="{{ route('applications.update', $application->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="status" value="approved" />

                                            <button class="text-green-600 hover:text-green-800">
                                                Approve
                                            </button>
                                        </form>

                                        <form action="{{ route('applications.update', $application->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="status" value="rejected" />

                                            <button class="text-red-600 hover:text-red-800">
                                                Reject
                                            </button>
                                        </form>

                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                        No applications yet.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>