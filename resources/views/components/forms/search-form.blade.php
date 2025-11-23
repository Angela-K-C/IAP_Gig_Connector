{{-- resources/views/components/forms/search-form.blade.php --}}

<div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg bg-white shadow-sm">
    <div class="flex-grow flex items-center border border-gray-300 rounded-md overflow-hidden">
        {{-- Search Icon (Magnifying Glass) --}}
        <span class="pl-3 text-gray-400">🔍</span> 
        
        <input 
            type="search" 
            name="search"
            placeholder="Search for gigs, roles, or companies..."
            class="flex-grow border-none focus:ring-0 p-2.5"
            value="{{ request('search') }}"
        >
    </div>
    
    {{-- Filter Dropdown (e.g., "Design") --}}
    <div class="relative">
        <select 
            name="filter_design" 
            class="border border-gray-300 rounded-md p-2.5 pr-10 appearance-none bg-white text-indigo-600 font-medium cursor-pointer"
        >
            <option value="">All Fields</option>
            <option value="design" @selected(request('filter') === 'design')>Design</option>
            <option value="marketing">Marketing</option>
            <option value="development">Development</option>
        </select>
        <span class="absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-500">
            ▼
        </span>
    </div>
    
    {{-- Search Button (Optional, if not relying on keypress) --}}
    <x-ui.button variant="primary" type="submit">
        Search
    </x-ui.button>
</div>