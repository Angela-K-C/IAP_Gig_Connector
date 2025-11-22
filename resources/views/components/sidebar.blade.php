<aside class="w-64 min-h-screen bg-blue-50 border-r-4 border-blue-400 shadow flex flex-col justify-start">
    <div class="p-6">
        <h2 class="text-lg font-semibold mb-4 text-blue-700">Provider Menu</h2>
        <ul class="space-y-2">
            <li>
                <x-nav-link :href="route('provider.dashboard')" :active="request()->routeIs('provider.dashboard')">
                    <span class="flex items-center">
                        <span class="bg-blue-100 rounded-full p-2 mr-3"><i class="bi bi-house-door-fill text-blue-500"></i></span>
                        Dashboard
                    </span>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('provider.gigs.manage')" :active="request()->routeIs('provider.gigs.manage')">
                    <span class="flex items-center">
                        <span class="bg-blue-100 rounded-full p-2 mr-3"><i class="bi bi-clipboard-check-fill text-blue-500"></i></span>
                        Manage Gigs
                    </span>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('provider.applications.index')" :active="request()->routeIs('provider.applications.index')">
                    <span class="flex items-center">
                        <span class="bg-blue-100 rounded-full p-2 mr-3"><i class="bi bi-envelope-fill text-blue-500"></i></span>
                        Applications
                    </span>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('provider.profile')" :active="request()->routeIs('provider.profile')">
                    <span class="flex items-center">
                        <span class="bg-blue-100 rounded-full p-2 mr-3"><i class="bi bi-person-fill text-blue-500"></i></span>
                        Profile
                    </span>
                </x-nav-link>
            </li>
        </ul>
    </div>
</aside>
