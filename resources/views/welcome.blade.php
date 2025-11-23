{{-- resources/views/welcome.blade.php --}}
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="flex flex-col md:flex-row items-center justify-between w-full max-w-5xl bg-white rounded-lg shadow-xl overflow-hidden p-8">
            
            {{-- Left Section: Illustration and Branding --}}
            <div class="flex-1 flex flex-col items-center justify-center p-6 pr-12 text-center md:text-left">
                <div class="mb-8">
                    <img src="{{ asset('images/gig-connector-illustration.png') }}" alt="Gig Connector Illustration" class="max-w-md mx-auto">
                </div>

                <div class="md:hidden mt-8"> {{-- Mobile only --}}
                    <h1 class="text-4xl font-extrabold text-indigo-700 mb-2">Gig Connector</h1>
                    <p class="text-indigo-500 text-lg">Connect, Apply, Grow</p>
                </div>
            </div>

            {{-- Right Section: Role Selection and Login --}}
            <div class="flex-1 flex flex-col items-center justify-center p-6 md:p-12 border-t md:border-t-0 md:border-l border-gray-200">
                <div class="hidden md:block mb-8"> {{-- Desktop only --}}
                    <h1 class="text-4xl font-extrabold text-indigo-700 mb-2">Gig Connector</h1>
                    <p class="text-indigo-500 text-lg">Connect, Apply, Grow</p>
                </div>
                
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
    </div>
</x-guest-layout>
