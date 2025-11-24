{{-- resources/views/provider/gigs/manage.blade.php --}}

<x-dashboard-layout>
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-2xl font-bold mb-8 text-gray-800 dark:text-gray-100">Create a New Gig Post</h2>
        <form method="POST" action="{{ route('gigs.store') }}" class="space-y-6">
            @csrf
            <x-ui.input-field label="Title" name="title" placeholder="e.g. Math Tutor" required />
            <x-ui.input-field label="Company" name="company" placeholder="e.g. Acme Corp" required />
            <div>
                <label for="description" class="block font-medium text-sm text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="4" required class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <x-ui.input-field label="Location" name="location" placeholder="e.g. Remote or Nairobi" required />
            <x-ui.input-field label="Salary" name="salary" type="number" placeholder="e.g. 50000" required />
            <x-ui.input-field label="Application Deadline" name="deadline" type="date" required />
            <div>
                <label for="requirements" class="block font-medium text-sm text-gray-700 mb-1">Requirements</label>
                <textarea id="requirements" name="requirements" rows="3" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <div>
                <label for="responsibilities" class="block font-medium text-sm text-gray-700 mb-1">Responsibilities</label>
                <textarea id="responsibilities" name="responsibilities" rows="3" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <div class="flex justify-end">
                <x-ui.Button type="submit" variant="primary" class="px-8 py-3">
                    Post Gig
                </x-ui.Button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
