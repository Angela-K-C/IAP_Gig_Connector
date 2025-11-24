{{-- resources/views/provider/gigs/create.blade.php --}}

<x-dashboard-layout title="Create New Job Posting" user="Provider">
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">

        {{-- Sidebar --}}
        <x-navigation.sidebar-nav />

        {{-- Main Content --}}
        <div class="flex-1 overflow-auto p-6 lg:p-10">
            <div class="max-w-6xl mx-auto">

                {{-- Page Title --}}
                <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-8">
                    Post a New Gig
                </h2>

                {{-- Gig Details Card (full width) --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 space-y-8">

                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Gig Details</h3>

                    <form action="{{ route('gigs.store') }}" method="POST" class="space-y-8">
                        @csrf

                        {{-- Job Title --}}
                        <x-ui.input-field 
                            id="job_title" 
                            label="Job Title" 
                            type="text" 
                            name="title" 
                            placeholder="e.g., Senior Software Engineer" 
                            :value="old('title')"
                        />

                        {{-- Description --}}
                        <x-ui.input-field 
                            id="description" 
                            label="Description" 
                            type="textarea" 
                            name="description" 
                            placeholder="Enter a detailed job description..."
                        >
                            {{ old('description') }}
                        </x-ui.input-field>

                        {{-- Location --}}
                        <x-ui.input-field 
                            id="location" 
                            label="Location" 
                            type="text" 
                            name="location" 
                            placeholder="Remote, Nairobi, Global HQ" 
                            :value="old('location')"
                            helper="Specify the work location."
                        />

                        {{-- Pay Rate & Amount --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-ui.input-field id="pay_rate_type" label="Pay Rate Type" type="select" name="pay_rate_type">
                                <option value="hourly" @if(old('pay_rate_type')=='hourly') selected @endif>Hourly</option>
                                <option value="monthly" @if(old('pay_rate_type')=='monthly') selected @endif>Monthly</option>
                                <option value="annual" @if(old('pay_rate_type')=='annual') selected @endif>Annual</option>
                                <option value="contract" @if(old('pay_rate_type')=='contract') selected @endif>Contract Rate</option>
                            </x-ui.input-field>

                            <x-ui.input-field 
                                id="pay_amount" 
                                label="Amount" 
                                type="number" 
                                name="pay_amount" 
                                placeholder="e.g., 500" 
                                :value="old('pay_amount')"
                                helper="Enter the amount (e.g., 500 for KES 500)"
                            />
                        </div>

                        {{-- Required Skills --}}
                        <x-ui.input-field 
                            id="required_skills" 
                            label="Required Skills" 
                            type="textarea" 
                            name="required_skills" 
                            placeholder="Enter skills separated by commas"
                        >
                            {{ old('required_skills') }}
                        </x-ui.input-field>

                        {{-- Application Deadline --}}
                        <x-ui.input-field 
                            id="deadline" 
                            label="Application Deadline" 
                            type="date" 
                            name="deadline" 
                            :value="old('deadline')"
                            helper="The last day applications will be accepted."
                        />

                        {{-- Submit Button --}}
                        <div class="flex justify-end">
                            <x-ui.Button type="submit" class="flex items-center px-8 py-3 text-lg">
                                <i data-lucide="save" class="w-5 h-5 mr-2"></i>
                                Save and Post Gig
                            </x-ui.Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>
</x-dashboard-layout>
