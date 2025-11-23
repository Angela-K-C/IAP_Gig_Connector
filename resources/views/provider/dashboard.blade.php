@extends('layouts.provider-layout')

@section('provider-content')
    <h1 class="text-3xl font-bold mb-8 text-[#4F37AD]">Your Jobs</h1>
    <div class="flex flex-col gap-8">
        @php
            $jobs = [
                [
                    'title' => 'Relationship Associate - Bancassurance',
                    'short_desc' => 'Help manage client relationships for our insurance partners.',
                    'id' => 1,
                ],
                [
                    'title' => 'Graphic Designer',
                    'short_desc' => 'Create visual content for marketing campaigns.',
                    'id' => 2,
                ],
                [
                    'title' => 'Mobile App Developer',
                    'short_desc' => 'Build and maintain our mobile applications.',
                    'id' => 3,
                ],
            ];
        @endphp
        @foreach($jobs as $job)
            <div class="flex flex-col gap-4 p-6 bg-white rounded-lg shadow w-full">
                <div>
                    <h2 class="font-semibold text-2xl text-[#151515]">{{ $job['title'] }}</h2>
                    <p class="text-gray-600">{{ $job['short_desc'] }}</p>
                </div>
                <div class="flex gap-6">
                    <x-primary-button onclick="window.location.href='{{ route('provider.applications.index', ['job' => $job['id']]) }}'">
                        View Applications
                    </x-primary-button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
