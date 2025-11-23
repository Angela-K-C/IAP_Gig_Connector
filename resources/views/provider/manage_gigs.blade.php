@extends('layouts.provider-layout')

@section('provider-content')
    <h1 class="text-2xl font-bold mb-4">Manage Gigs</h1>
    <div class="flex items-center justify-end mb-6">
        <a href="{{ route('provider.gigs.create') }}">
            <x-primary-button>
                Create New Gig
            </x-primary-button>
        </a>
    </div>
    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white border border-gray-200 rounded shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Title</th>
                    <th class="px-4 py-2 border-b">Category</th>
                    <th class="px-4 py-2 border-b">Status</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gigs as $gig)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $gig->title }}</td>
                        <td class="px-4 py-2 border-b">{{ $gig->category ?? ($gig->required_skills ?? '-') }}</td>
                        <td class="px-4 py-2 border-b">{{ $gig->status }}</td>
                        <td class="px-4 py-2 border-b flex space-x-2">
                            <a href="#" class="flex items-center text-blue-600 hover:underline mr-2">
                                <span class="bg-blue-100 rounded-full p-2 mr-1"><i class="bi bi-pencil-square"></i></span>
                                Edit
                            </a>
                            <a href="#" class="flex items-center text-red-600 hover:underline">
                                <span class="bg-red-100 rounded-full p-2 mr-1"><i class="bi bi-trash-fill"></i></span>
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">No gigs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
