@php
    $user = Auth::user();
    $role = $user?->role ?? 'student';
@endphp

<div x-data="{ open: false }" class="relative">
    <!-- Hamburger for small screens -->
    <button @click="open = !open" class="md:hidden fixed top-4 left-4 z-50 p-2 rounded-lg bg-white shadow-md border border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Overlay for mobile -->
    <div 
        x-show="open" 
        x-cloak
        @click="open = false" 
        x-transition:enter="transition-opacity ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-black bg-opacity-50 md:hidden">
    </div>

    <!-- Sidebar -->
    <aside 
        :class="{'translate-x-0': open, '-translate-x-full': !open}" 
        class="fixed top-0 left-0 z-50 w-64 h-screen bg-gray-50 dark:bg-gray-900 flex flex-col justify-between border-r border-gray-200 dark:border-gray-700 p-6 transform transition-transform duration-300 ease-in-out md:translate-x-0 md:static"
    >
        {{-- User Info --}}
        <div class="flex-1 overflow-y-auto">
            <div class="flex items-center mb-8">
                <img src="{{ $user?->avatar_url ?? 'https://i.pravatar.cc/40' }}" alt="Avatar" class="w-10 h-10 rounded-full mr-3 ring-2 ring-gray-200 dark:ring-gray-700">
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100 text-sm">{{ $user?->name ?? 'John Doe' }}</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ ucfirst($role) }}</div>
                </div>
            </div>

            {{-- MAIN SECTION --}}
            <div class="mb-10">
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4 px-3">Main</div>
                
                <nav class="space-y-2">            
                    {{-- Dashboard --}}
                    <a href="{{ url('/dashboard') }}" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-all duration-200
                        {{ request()->routeIs('gigs.manage') ? 'bg-violet-100 dark:bg-violet-900/30 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' }}">
                        <i data-lucide="grid" class="w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>

                    {{-- My Applications for students, Manage Posts for providers --}}
                    @if($role === 'provider')
                        <a href="{{ route('applications.index') }}" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-all duration-200
                            {{ request()->routeIs('gigs.manage') ? 'bg-violet-100 dark:bg-violet-900/30 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' }}">
                            <i data-lucide="list" class="w-5 h-5 mr-3"></i>
                            <span>Manage Posts</span>
                        </a>
                    @elseif(Route::has('applications.index'))
                        <a href="{{ route('applications.index') }}" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-all duration-200
                            {{ request()->routeIs('applications.*') ? 'bg-violet-100 dark:bg-violet-900/30 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' }}">
                            <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                            <span>My Applications</span>
                        </a>
                    @endif

                    {{-- Saved Jobs --}}
                    @if ($role === 'student')
                        <a href="{{ route('gigs.saved') }}" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-all duration-200
                            {{ request()->routeIs('student.saved_jobs') ? 'bg-violet-100 dark:bg-violet-900/30 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' }}">
                            <i data-lucide="folder" class="w-5 h-5 mr-3"></i>
                            <span>Saved Jobs</span>
                        </a>
                    @endif

                    {{-- My Profile --}}
                    @if(Route::has('profile.edit'))
                        <a href="{{ route('profile.edit') }}" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-all duration-200
                            {{ request()->routeIs('profile.*') ? 'bg-violet-100 dark:bg-violet-900/30 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' }}">
                            <i data-lucide="user" class="w-5 h-5 mr-3"></i>
                            <span>My Profile</span>
                        </a>
                    @endif

                    {{-- Settings --}}
                    @if(Route::has('settings'))
                        <a href="{{ route('settings') }}" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-all duration-200
                            {{ request()->routeIs('settings') ? 'bg-violet-100 dark:bg-violet-900/30 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' }}">
                            <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
                            <span>Settings</span>
                        </a>
                    @endif
                </nav>
            </div>

            {{-- MESSAGES SECTION --}}
            @if(Route::has('notifications'))
                <div class="pt-8 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4 px-3">
                        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Messages</div>
                        <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <nav class="space-y-2">
                        <a href="{{ route('notifications') }}" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-all duration-200
                            {{ request()->routeIs('notifications') ? 'bg-violet-100 dark:bg-violet-900/30 text-gray-900 dark:text-white shadow-sm' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white' }}">
                            <i data-lucide="bell" class="w-5 h-5 mr-3"></i>
                            <span>Notifications</span>
                        </a>
                    </nav>
                </div>
            @endif
        </div>

        {{-- Logout & Branding --}}
        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="flex items-center w-full text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/10 px-3 py-2 rounded-lg transition-all duration-200 font-medium"
                >
                    <i class="w-5 h-5 mr-3" data-lucide="log-out"></i>
                    <span>Log out</span>
                </button>
            </form>
            <div class="text-xs text-indigo-600 dark:text-indigo-400 text-center mt-3 font-semibold leading-tight">
                Gig Connector <br> 
                <span class="text-gray-500 dark:text-gray-400 font-normal">Connect, Apply, Grow</span>
            </div>
        </div>
    </aside>
</div>

{{-- Lucide Icons Initialization --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>

{{-- AlpineJS for toggle --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>