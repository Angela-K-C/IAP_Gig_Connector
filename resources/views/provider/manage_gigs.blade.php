@extends('layouts.provider-layout')

@section('provider-content')
    <h1 class="text-2xl font-bold mb-4">Manage Gigs</h1>
    <div class="flex items-center justify-end mb-6">
        <x-primary-button onclick="window.location.href='#'">
            Create New Gig
        </x-primary-button>
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
                <!-- Sample gigs, replace with dynamic data later -->
                <tr>
                    <td class="px-4 py-2 border-b">Web Development Project</td>
                    <td class="px-4 py-2 border-b">IT & Software</td>
                    <td class="px-4 py-2 border-b">Open</td>
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
                <tr>
                    <td class="px-4 py-2 border-b">Graphic Design Task</td>
                    <td class="px-4 py-2 border-b">Design</td>
                    <td class="px-4 py-2 border-b">Closed</td>
                    <td class="px-4 py-2 border-b">
                        <a href="#" class="flex items-center text-blue-600 hover:underline mr-2">
                            <span class="bg-blue-100 rounded-full p-2 mr-1"><i class="bi bi-pencil-square"></i></span>
                            Edit
                        </a>
                        <a href="#" class="flex items-center text-red-600 hover:underline">
                            <span class="bg-red-100 rounded-full p-2 mr-1"><i class="bi bi-trash-fill"></i></span>
                            
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
