<aside class="w-64 min-h-screen bg-blue-50 border-r-4 border-blue-400 shadow flex flex-col justify-start">
    <div class="p-6">
        <h2 class="text-lg font-semibold mb-4 text-blue-700">Provider Menu</h2>
        <ul class="space-y-2">
            <li><a href="{{ route('provider.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a></li>
            <li><a href="{{ route('provider.gigs.manage') }}" class="text-gray-700 hover:text-blue-600 font-medium">Manage Gigs</a></li>
            <li><a href="{{ route('provider.applications.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Applications</a></li>
            <li><a href="{{ route('provider.profile') }}" class="text-gray-700 hover:text-blue-600 font-medium">Profile</a></li>
        </ul>
    </div>
</aside>
