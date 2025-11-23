{{-- resources/views/components/navigation/sidebar-nav.blade.php --}}

<div style="width: 200px; background-color: #f8f8ff; height: 100vh; padding: 20px; box-sizing: border-box; border-right: 1px solid #eee; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
        {{-- User Info Section --}}
        <div style="font-size: 12px; color: #6b46c1; text-transform: uppercase; margin-bottom: 5px;">
            STUDENT
        </div>
        <div style="font-weight: bold; margin-bottom: 30px;">
            {{ Auth::user()->name ?? 'John Doe' }}
        </div>
        
        {{-- Main Navigation Links --}}
        <div style="margin-bottom: 30px;">
            <div style="font-size: 12px; color: #888; margin-bottom: 10px;">MAIN</div>
            
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <span class="icon">🏠</span> Dashboard
            </x-nav-link>
            
            <x-nav-link href="{{ route('recommendations') }}" :active="request()->routeIs('recommendations')">
                <span class="icon">🌟</span> Recommendations
            </x-nav-link>

            {{-- ... other links (My Applications, Saved Jobs, My Profile, Settings) ... --}}

            <x-nav-link href="{{ route('profile') }}" :active="request()->routeIs('profile')">
                <span class="icon">👤</span> My Profile
            </x-nav-link>
        </div>

        {{-- Messages/Notifications Section --}}
        <div>
            <div style="font-size: 12px; color: #888; margin-bottom: 10px;">MESSAGES</div>
            <x-nav-link href="{{ route('notifications') }}" :active="request()->routeIs('notifications')">
                <span class="icon">🔔</span> Notifications
            </x-nav-link>
        </div>
    </div>

    {{-- Log Out Section --}}
    <div style="padding-top: 20px; border-top: 1px solid #eee;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: none; border: none; width: 100%; text-align: left; color: #a00; padding: 10px 15px; cursor: pointer;">
                ➡️ Log out
            </button>
        </form>
        <div style="font-size: 10px; color: #6b46c1; text-align: center; margin-top: 10px;">
            Gig Connector <br/> Connect, Apply, Grow
        </div>
    </div>
</div>