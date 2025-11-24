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

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Web Developer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Open</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2025-12-05</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">Apply</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="px-3 py-1 text-red-600 hover:underline" onclick="return confirm('Remove this saved job?')">Delete</button>
                                </td>
                            </tr>

                            <tr class="bg-red-100 dark:bg-red-900/40 hover:bg-red-200 dark:hover:bg-red-900/60">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Graphic Designer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-700 dark:text-red-300 font-semibold rounded">Closed</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2025-11-30</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="px-3 py-1 bg-gray-300 dark:bg-gray-700 text-gray-400 dark:text-gray-500 rounded-lg text-sm cursor-not-allowed opacity-60" disabled>Apply</button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="px-3 py-1 text-red-600 hover:underline" onclick="return confirm('Remove this saved job?')">Delete</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Data Entry Clerk</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Open</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2025-12-10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">Apply</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="px-3 py-1 text-red-600 hover:underline" onclick="return confirm('Remove this saved job?')">Delete</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>