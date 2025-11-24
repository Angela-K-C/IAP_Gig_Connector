{{-- resources/views/welcome.blade.php --}}
<x-guest-layout>
    <div class="min-h-[200vh] flex items-center justify-center bg-gray-50 py-24 px-4">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow-xl overflow-hidden p-8 flex flex-col items-center justify-center" style="margin-top: 0; margin-bottom: 0;">
            <h1 class="text-4xl font-extrabold text-indigo-700 mb-2 text-center">Gig Connector</h1>
            <p class="text-indigo-500 text-lg mb-8 text-center">Connect, Apply, Grow</p>
            <p class="text-lg text-gray-700 mb-8 text-center">Join us as a:</p>
            <div class="w-full max-w-xs space-y-4">
                <x-ui.Button 
                    variant="primary" 
                    class="w-full text-lg py-3"
                    onclick="window.location.href='{{ route('register', ['role' => 'student']) }}'">
                    I'm a Student
                </x-ui.Button>
                <x-ui.Button 
                    variant="secondary" 
                    class="w-full text-lg py-3"
                    onclick="window.location.href='{{ route('register', ['role' => 'provider']) }}'">
                    I'm a Provider
                </x-ui.Button>
            </div>
            <p class="mt-8 text-sm text-gray-600 text-center">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 underline font-medium">Login</a>
            </p>
        </div>
    </div>
</x-guest-layout>
