<div class="space-y-4">
    <!-- Input fields for a new job -->
    <div wire:key="experience-form" class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <input type="text" wire:model="title" placeholder="Job Title" class="border rounded p-2 w-full" />
        <input type="text" wire:model="company" placeholder="Company" class="border rounded p-2 w-full" />
        <input type="date" wire:model="start_date" class="border rounded p-2 w-full" />
        <input type="date" wire:model="end_date" class="border rounded p-2 w-full" />
        <textarea wire:model="description" placeholder="Description" class="border rounded p-2 w-full"></textarea>
    </div>

    <button wire:click="addExperience" type="button" class="px-4 py-2 bg-blue-600 text-white rounded">
        Add Job
    </button>

    <!-- Display added jobs -->
    <div class="space-y-2 mt-4">
        @foreach($experiences as $index => $exp)
            <div class="flex justify-between items-center border p-2 rounded">
                <div wire:key="experience-{{ $index }}">
                    <strong>{{ $exp['title'] }}</strong> at {{ $exp['company'] }}
                    ({{ $exp['start_date'] }} - {{ $exp['end_date'] ?? 'Present' }})
                    <p>{{ $exp['description'] }}</p>
                </div>
                
                <button wire:click="removeExperience({{ $index }})" class="text-red-600">Remove</button>

            </div>
        @endforeach
    </div>

    @if (session()->has('success'))
        <p class="text-green-600 mt-2">{{ session('success') }}</p>
    @endif
</div>
