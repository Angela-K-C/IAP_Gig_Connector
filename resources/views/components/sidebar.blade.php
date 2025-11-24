<aside class="w-64 min-h-screen bg-white shadow-lg border-r flex flex-col">
    <!-- User Section -->
    <div class="p-6 flex items-center gap-3 border-b">
        <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full" alt="">
        <div>
            <p class="font-semibold text-gray-800">STUDENT</p>
            <p class="text-sm text-gray-500">Scholar’s Hub</p>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="flex-1 p-4">
        <p class="text-xs uppercase text-gray-400 mb-3">Main</p>

        <ul class="space-y-2">
            <li>
                <a href="{{ route('provider.dashboard') }}"
                    class="flex items-center px-3 py-2 rounded-xl hover:bg-purple-50 transition
                           {{ request()->routeIs('provider.dashboard') ? 'bg-purple-100 text-purple-700' : 'text-gray-700' }}">
                    <span class="p-2 rounded-xl bg-purple-50 mr-3">
                        <i class="bi bi-grid-fill text-purple-600"></i>
                    </span>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('provider.gigs.manage') }}"
                    class="flex items-center px-3 py-2 rounded-xl hover:bg-purple-50 transition
                           {{ request()->routeIs('provider.gigs.manage') ? 'bg-purple-100 text-purple-700' : 'text-gray-700' }}">
                    <span class="p-2 rounded-xl bg-purple-50 mr-3">
                        <i class="bi bi-layers-fill text-purple-600"></i>
                    </span>
                    Posts
                </a>
            </li>

            <li>
                <a href="{{ route('provider.applications.index') }}"
                    class="flex items-center px-3 py-2 rounded-xl hover:bg-purple-50 transition
                           {{ request()->routeIs('provider.applications.index') ? 'bg-purple-100 text-purple-700' : 'text-gray-700' }}">
                    <span class="p-2 rounded-xl bg-purple-50 mr-3">
                        <i class="bi bi-people-fill text-purple-600"></i>
                    </span>
                    Applicants
                </a>
            </li>

            <li>
                <a href="{{ route('provider.profile') }}"
                    class="flex items-center px-3 py-2 rounded-xl hover:bg-purple-50 transition
                           {{ request()->routeIs('provider.profile') ? 'bg-purple-100 text-purple-700' : 'text-gray-700' }}">
                    <span class="p-2 rounded-xl bg-purple-50 mr-3">
                        <i class="bi bi-person-fill text-purple-600"></i>
                    </span>
                    My Profile
                </a>
            </li>
        </ul>

        <!-- Saved -->
        <p class="text-xs uppercase text-gray-400 mt-6 mb-3">Messages</p>
        <ul class="space-y-2">
            <li>
                <a href="#" class="flex items-center px-3 py-2 rounded-xl hover:bg-purple-50 transition text-gray-700">
                    <span class="p-2 rounded-xl bg-purple-50 mr-3">
                        <i class="bi bi-bell-fill text-purple-600"></i>
                    </span>
                    Notifications
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer -->
    <div class="p-6 mt-auto border-t">
        <button class="flex items-center gap-3 text-red-500 hover:text-red-600">
            <i class="bi bi-box-arrow-right"></i> Log Out
        </button>

        <p class="text-xs text-gray-400 mt-4">Gig Connector<br>Connect. Apply. Grow</p>
    </div>
</aside>
