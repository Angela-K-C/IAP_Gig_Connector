<x-app-layout>
    <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
        <x-navigation.sidebar-nav />
        
        <div class="flex-1 overflow-auto">
            <main class="p-6 lg:p-10 max-w-4xl mx-auto">
                
                {{-- Header --}}
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">Welcome</h1>
                    <p class="text-gray-600 dark:text-gray-400">Manage your organization information</p>
                </div>

                {{-- Profile Card --}}
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl border border-gray-200 dark:border-gray-700 p-8">
                    
                    <form method="POST" action="{{ route('provider.profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        {{-- Full Name / Organization Name --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">
                                Full Name / Organization Name
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="circle" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Jane Doe"
                                    required
                                    class="w-full pl-12 pr-4 py-3.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                >
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">
                                Email
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="circle" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="jane@gmail.com"
                                    required
                                    class="w-full pl-12 pr-4 py-3.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                >
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Provider Type --}}
                        <div>
                            <label for="provider_type" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">
                                Provider Type
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="circle" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <select 
                                    id="provider_type" 
                                    name="provider_type"
                                    class="w-full pl-12 pr-10 py-3.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition appearance-none"
                                >
                                    <option value="" disabled {{ !$user->provider_type ? 'selected' : '' }}>Select here...</option>
                                    <option value="company" {{ old('provider_type', $user->provider_type) === 'company' ? 'selected' : '' }}>Company</option>
                                    <option value="individual" {{ old('provider_type', $user->provider_type) === 'individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="startup" {{ old('provider_type', $user->provider_type) === 'startup' ? 'selected' : '' }}>Startup</option>
                                    <option value="agency" {{ old('provider_type', $user->provider_type) === 'agency' ? 'selected' : '' }}>Agency</option>
                                    <option value="nonprofit" {{ old('provider_type', $user->provider_type) === 'nonprofit' ? 'selected' : '' }}>Non-Profit</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-400"></i>
                                </div>
                            </div>
                            @error('provider_type')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Organization Description --}}
                        <div>
                            <label for="organization_description" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">
                                Organization Description <span class="text-gray-400 text-xs">(Optional)</span>
                            </label>
                            <textarea 
                                id="organization_description" 
                                name="organization_description" 
                                rows="4"
                                placeholder="Tell us about your organization..."
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none"
                            >{{ old('organization_description', $user->organization_description) }}</textarea>
                            @error('organization_description')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Contact Phone --}}
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">
                                Contact Phone <span class="text-gray-400 text-xs">(Optional)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="phone" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    value="{{ old('phone', $user->phone) }}"
                                    placeholder="+254 700 000000"
                                    class="w-full pl-12 pr-4 py-3.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                >
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-6">
                            <button 
                                type="submit"
                                class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-semibold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl"
                            >
                                Update Profile
                            </button>
                        </div>

                        {{-- Success Message --}}
                        @if (session('status') === 'profile-updated')
                            <div class="p-4 bg-green-100 dark:bg-green-900/30 border border-green-300 dark:border-green-700 rounded-lg mt-4">
                                <p class="text-sm text-green-800 dark:text-green-300 font-medium text-center">
                                    Profile updated successfully!
                                </p>
                            </div>
                        @endif
                    </form>

                </div>

                {{-- Additional Info --}}
                <div class="mt-6 text-center">
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Need help? 
                        <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-medium">
                            Contact Support
                        </a>
                    </p>
                </div>

            </main>
        </div>
    </div>
</x-app-layout>
