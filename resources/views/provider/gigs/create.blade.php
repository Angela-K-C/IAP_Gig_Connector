{{-- resources/views/provider/gigs/create.blade.php --}}

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <x-navigation.sidebar-nav />

    {{-- Main Content --}}
    <div class="flex-1 overflow-auto p-6 lg:p-12">

        <x-dashboard-layout title="Create New Job Posting" user="Provider">

            <div class="max-w-5xl mx-auto">

                {{-- Page Title --}}
                <div class="mb-10">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100">
                        Post a New Gig
                    </h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 text-lg">
                        Fill in the form below to create a job posting for students.
                    </p>
                </div>

                {{-- Gig Form Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-10 space-y-10">

                    {{-- Section Header --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                            Gig Details
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">
                            Provide all the important details about the gig.
                        </p>
                    </div>

                    <form action="{{ route('gigs.store') }}" method="POST" class="space-y-10">
                        @csrf

                        {{-- Job Title --}}
                        <x-ui.input-field 
                            id="job_title" 
                            label="Job Title" 
                            type="text" 
                            name="title" 
                            placeholder="e.g., Social Media Manager" 
                            :value="old('title')"
                        />

                        {{-- Description --}}
                        <x-ui.input-field 
                            id="description" 
                            label="Description" 
                            type="textarea" 
                            name="description" 
                            placeholder="Describe the job responsibilities, expectations, and context..."
                        >
                            {{ old('description') }}
                        </x-ui.input-field>

                        {{-- Location --}}
                        <x-ui.input-field 
                            id="location" 
                            label="Location" 
                            type="text" 
                            name="location" 
                            placeholder="Remote, Nairobi, In-office, Hybrid" 
                            :value="old('location')"
                            helper="Specify where applicants will work from."
                        />

                        {{-- Payment Section --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            {{-- Pay Type --}}
                            <x-ui.input-field id="payment_type" label="Payment Type" type="select" name="payment_type">
                                <option value="hourly" @selected(old('payment_type')=='hourly')>Hourly</option>
                                <option value="monthly" @selected(old('payment_type')=='monthly')>Monthly</option>
                                <option value="annual" @selected(old('payment_type')=='annual')>Annual</option>
                                <option value="contract" @selected(old('payment_type')=='contract')>Contract Rate</option>
                            </x-ui.input-field>

                            {{-- Pay Amount --}}
                            <x-ui.input-field 
                                id="payment_amount" 
                                label="Amount (KES)" 
                                type="number" 
                                name="payment_amount" 
                                placeholder="500" 
                                :value="old('payment_amount')"
                                helper="Enter the amount based on your chosen payment type."
                            />
                        </div>

                        {{-- Skills --}}
                        <x-ui.input-field 
                            id="required_skills" 
                            label="Required Skills" 
                            type="textarea" 
                            name="required_skills" 
                            placeholder="e.g., Photoshop, Writing, JavaScript"
                        >
                            {{ old('required_skills') }}
                        </x-ui.input-field>

                        {{-- Deadline --}}
                        <x-ui.input-field 
                            id="application_deadline" 
                            label="Application Deadline" 
                            type="date" 
                            name="application_deadline" 
                            :value="old('application_deadline')"
                            helper="After this date, applications will no longer be accepted."
                        />

                        {{-- Submit Button --}}
                        <div class="flex justify-end pt-4 border-t border-gray-200 dark:border-gray-700">
                            <x-ui.Button type="submit" class="flex items-center px-10 py-4 text-lg">
                                <i data-lucide="save" class="w-5 h-5 mr-2"></i>
                                Save & Publish Gig
                            </x-ui.Button>
                        </div>

                    </form>
                </div>
            </div>

        </x-dashboard-layout>

    </div>
</div>

{{-- Lucide Icons --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>