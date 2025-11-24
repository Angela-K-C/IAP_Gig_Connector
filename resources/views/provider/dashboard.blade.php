@extends('layouts.provider-layout')

@section('provider-content')
<div class="w-full px-2">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Hi, Scholar’s Hub 👋</h1>
    <p class="text-gray-500 mb-6">Use the search bar to look up your posts.</p>

    <!-- Search + Filter Bar -->
    <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl border mb-8">
        <i class="bi bi-funnel text-gray-500"></i>

        <div class="flex items-center bg-white px-4 py-2 rounded-lg w-full shadow-sm border">
            <i class="bi bi-search text-gray-400 mr-3"></i>
            <input type="text" placeholder="Design" class="w-full focus:outline-none" />
        </div>
    </div>

    <!-- Job Cards -->
    <div class="space-y-6">
        @foreach($jobs as $job)
        <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition">
            <h2 class="text-xl font-bold text-gray-800">{{ $job['title'] }}</h2>
            <p class="text-gray-600">{{ $job['short_desc'] }}</p>

            <button
                onclick="window.location.href='{{ route('provider.applications.index', ['job' => $job['id']]) }}'"
                class="mt-4 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">
                View Applications
            </button>
        </div>
        @endforeach
    </div>
</div>
@endsection
