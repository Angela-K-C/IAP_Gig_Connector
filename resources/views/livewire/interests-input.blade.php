<div class="space-y-3">

     <!-- Interests list -->
    <div class="space-y-1">
        @foreach($interests ?? [] as $index => $i)
            <div wire:key="interest-item-{{ $index }}" class="flex justify-between items-center border p-2 rounded">
                <span>{{ $i }}</span>

                <button 
                    type="button"
                    wire:click="removeInterest({{ $index }})"
                    class="text-red-600"
                >
                    Remove
                </button>

                <!-- Hidden input so interests submit with the form -->
                <input type="hidden" name="interests[]" value="{{ $i }}">
            </div>
        @endforeach
    </div>
    
    <!-- Input -->
    <div class="flex gap-2">
        <input 
            type="text"
            wire:model="interest"
            class="border rounded p-2 w-full"
            placeholder="Enter an interest"
            autocomplete="off"
        >

        <button 
            wire:click="addInterest"
            type="button"
            class="px-4 bg-blue-600 text-white rounded"
        >
            Add
        </button>
    </div>

   
</div>
