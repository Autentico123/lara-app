<x-guest-layout>
    <!-- Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Create Account</h2>
        <p class="text-sm text-gray-600 mt-1">Join TradeLink and start trading today</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm"
                    placeholder="John Doe">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm"
                    placeholder="you@example.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm"
                    placeholder="Min. 8 characters">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm"
                    placeholder="Re-enter password">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Collapsible Optional Section -->
        <div class="border-t border-gray-200 pt-4 mt-4">
            <div class="flex items-center gap-2 mb-3">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Optional Information</span>
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                <input id="location" type="text" name="location" value="{{ old('location') }}" placeholder="e.g., New York, USA" autocomplete="off"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm">
                <p class="text-xs text-gray-500 mt-1">Help buyers know where you're located</p>
                <x-input-error :messages="$errors->get('location')" class="mt-1" />
            </div>

            <!-- Facebook Link -->
            <div class="mb-3">
                <label for="facebook_link" class="block text-sm font-medium text-gray-700 mb-1">
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                        Facebook Profile
                    </span>
                </label>
                <input id="facebook_link" type="url" name="facebook_link" value="{{ old('facebook_link') }}" placeholder="https://facebook.com/yourprofile" autocomplete="off"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm">
                <x-input-error :messages="$errors->get('facebook_link')" class="mt-1" />
            </div>

            <!-- Messenger Link -->
            <div>
                <label for="messenger_link" class="block text-sm font-medium text-gray-700 mb-1">
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.974 12-11.111C24 4.975 18.627 0 12 0zm1.193 14.963l-3.056-3.259-5.963 3.259L10.733 8l3.13 3.259L19.752 8l-6.559 6.963z" />
                        </svg>
                        Messenger Link
                    </span>
                </label>
                <input id="messenger_link" type="url" name="messenger_link" value="{{ old('messenger_link') }}" placeholder="https://m.me/yourprofile" autocomplete="off"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm">
                <p class="text-xs text-gray-500 mt-1">Let buyers contact you directly</p>
                <x-input-error :messages="$errors->get('messenger_link')" class="mt-1" />
            </div>
        </div>

        <!-- Register Button -->
        <div class="pt-2">
            <button type="submit" class="w-full btn-primary py-3 text-base font-semibold shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 hover:scale-[1.02] transition-all duration-300">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Create Account
                </span>
            </button>
        </div>

        <!-- Login Link -->
        <div class="text-center pt-4 border-t border-gray-200">
            <span class="text-sm text-gray-600">Already have an account? </span>
            <a href="{{ route('login') }}" class="text-sm font-semibold text-deal-orange hover:text-amber-600 transition-colors">
                Sign in here
            </a>
        </div>
    </form>
</x-guest-layout>