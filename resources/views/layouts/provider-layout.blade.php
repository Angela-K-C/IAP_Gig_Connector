@extends('layouts.app')

@section('main-content')
    <div class="min-h-screen bg-gray-100 flex flex-col">
        
        <div class="flex flex-1">
            {{-- Sidebar (component) --}}
            @include('components.sidebar')
            
            {{-- Main Content --}}
            <main class="flex-1 p-8 min-h-screen">
                @yield('provider-content')
            </main>
            
        </div>
    </div>
@endsection
