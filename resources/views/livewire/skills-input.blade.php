<div class="space-y-3">

     <!-- Skills list -->
    <div class="space-y-1">
        @foreach($skills as $index => $s)
            <div class="flex justify-between items-center border p-2 rounded">
                <span>{{ $s }}</span>

                <button 
                    type="button"
                    wire:click="removeSkill({{ $index }})"
                    class="text-red-600"
                >
                    Remove
                </button>

                <!-- Hidden input so skills submit with the form -->
                <input type="hidden" name="skills[]" value="{{ $s }}">
            </div>
        @endforeach
    </div>
    
    <!-- Input -->
    <div class="flex gap-2">
        <input 
            type="text"
            wire:model="skill"
            class="border rounded p-2 w-full"
            placeholder="Enter a skill"
        >

        <button 
            wire:click="addSkill"
            type="button"
            class="px-4 bg-blue-600 text-white rounded"
        >
            Add
        </button>
    </div>

   
</div>
