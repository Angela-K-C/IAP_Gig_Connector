@extends('layouts.provider-layout')

@section('provider-content')
    <div class="flex flex-col gap-16 w-full max-w-6xl mx-auto">
        <!-- Job Details -->
        <div class="flex flex-col gap-8 w-full">
            <h1 class="font-roboto font-semibold text-3xl text-[#4F37AD]">Job Details</h1>
            <div class="flex flex-col gap-4">
                <div class="font-poppins font-medium text-2xl text-[#151515]">Opening For Relationship Associate - Bancassurance</div>
                <div class="flex gap-6 flex-wrap">
                    <div class="font-roboto text-base text-[#374151]">
                        <span class="font-semibold font-poppins">Provider Name:</span> <span class="font-bold font-plusjakartasans text-[#4F37AD]">Company X</span>
                    </div>
                    <div class="font-roboto text-base text-[#374151]">
                        <span class="font-semibold font-poppins">Pay rate:</span> <span class="font-bold font-plusjakartasans text-[#4F37AD]">500ksh per hour</span>
                    </div>
                    <div class="font-roboto text-base text-[#374151]">
                        <span class="font-semibold font-poppins">Duration:</span> <span class="font-bold font-plusjakartasans text-[#4F37AD]">2 months</span>
                    </div>
                    <div class="font-roboto text-base text-[#374151]">
                        <span class="font-semibold font-poppins">Type:</span> <span class="font-bold font-plusjakartasans text-[#4F37AD]">Remote</span>
                    </div>
                    <div class="font-roboto text-base text-[#374151]">
                        <span class="font-semibold font-poppins">Location:</span> <span class="font-bold font-plusjakartasans text-[#4F37AD]">To be Communicated</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Applications Table -->
        <div class="w-full">
            <h2 class="font-roboto font-medium text-xl text-[#374151] mb-4">Applications</h2>
            <table class="w-full bg-white border border-gray-200 rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Applicant Name</th>
                        <th class="px-4 py-2 border-b">Status</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $applications = [
                            ['name' => 'Jane Doe', 'status' => 'Pending'],
                            ['name' => 'John Smith', 'status' => 'Accepted'],
                            ['name' => 'Alice Johnson', 'status' => 'Rejected'],
                            ['name' => 'Bob Lee', 'status' => 'Pending'],
                            ['name' => 'Emily Clark', 'status' => 'Pending'],
                        ];
                    @endphp
                    @foreach($applications as $app)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $app['name'] }}</td>
                            <td class="px-4 py-2 border-b">{{ $app['status'] }}</td>
                            <td class="px-4 py-2 border-b flex space-x-2">
                                <x-primary-button>View</x-primary-button>
                                <x-primary-button class="bg-green-600 hover:bg-green-700">Accept</x-primary-button>
                                <x-secondary-button class="bg-red-100 text-red-600 hover:bg-red-200">Reject</x-secondary-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
