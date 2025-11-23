@extends('layouts.provider-layout')

@section('provider-content')
    <h1 class="text-2xl font-bold mb-4">Create New Gig</h1>
    <form method="POST" action="{{ route('provider.gigs.store') }}" class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-6">
        @csrf
        <div class="mb-4">
            <x-input-label for="title" :value="'Title'" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="description" :value="'Description'" />
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3" required></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="required_skills" :value="'Required Skills'" />
            <x-text-input id="required_skills" name="required_skills" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('required_skills')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="payment_type" :value="'Payment Type'" />
            <select id="payment_type" name="payment_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="Hourly">Hourly</option>
                <option value="Fixed">Fixed</option>
            </select>
            <x-input-error :messages="$errors->get('payment_type')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="payment_amount" :value="'Payment Amount'" />
            <x-text-input id="payment_amount" name="payment_amount" type="number" step="0.01" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('payment_amount')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="duration" :value="'Duration'" />
            <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="application_deadline" :value="'Application Deadline'" />
            <x-text-input id="application_deadline" name="application_deadline" type="date" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('application_deadline')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="status" :value="'Status'" />
            <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end space-x-2 mt-6">
            <a href="{{ route('provider.gigs.manage') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Cancel</a>
            <x-primary-button>Create</x-primary-button>
        </div>
    </form>
@endsection
