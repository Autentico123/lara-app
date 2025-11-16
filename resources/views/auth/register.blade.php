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

        <!-- Facebook Link -->
        <div>
            <label for="facebook_link" class="block text-sm font-semibold text-gray-700 mb-2">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                    Facebook Profile
                </span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <input id="facebook_link" type="url" name="facebook_link" value="{{ old('facebook_link') }}" required
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm"
                    placeholder="https://facebook.com/yourprofile">
            </div>
            <p class="text-xs text-gray-500 mt-1">Buyers will use this to contact you</p>
            <x-input-error :messages="$errors->get('facebook_link')" class="mt-1" />
        </div>

        <!-- Messenger Link -->
        <div>
            <label for="messenger_link" class="block text-sm font-semibold text-gray-700 mb-2">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#0084FF]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.974 12-11.111C24 4.975 18.627 0 12 0zm1.193 14.963l-3.056-3.259-5.963 3.259L10.733 8l3.13 3.259L19.752 8l-6.559 6.963z" />
                    </svg>
                    Messenger Link
                </span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <input id="messenger_link" type="url" name="messenger_link" value="{{ old('messenger_link') }}" required
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm"
                    placeholder="https://m.me/yourprofile">
            </div>
            <p class="text-xs text-gray-500 mt-1">Direct messaging link for quick communication</p>
            <x-input-error :messages="$errors->get('messenger_link')" class="mt-1" />
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Location in Bohol
                </span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <select id="location" name="location" required
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-deal-orange focus:border-deal-orange transition-colors bg-gray-50 focus:bg-white text-sm appearance-none">
                    <option value="">Select your municipality/city</option>
                    <option value="Tagbilaran City" {{ old('location') == 'Tagbilaran City' ? 'selected' : '' }}>Tagbilaran City</option>
                    <option value="Alburquerque" {{ old('location') == 'Alburquerque' ? 'selected' : '' }}>Alburquerque</option>
                    <option value="Alicia" {{ old('location') == 'Alicia' ? 'selected' : '' }}>Alicia</option>
                    <option value="Anda" {{ old('location') == 'Anda' ? 'selected' : '' }}>Anda</option>
                    <option value="Antequera" {{ old('location') == 'Antequera' ? 'selected' : '' }}>Antequera</option>
                    <option value="Baclayon" {{ old('location') == 'Baclayon' ? 'selected' : '' }}>Baclayon</option>
                    <option value="Balilihan" {{ old('location') == 'Balilihan' ? 'selected' : '' }}>Balilihan</option>
                    <option value="Batuan" {{ old('location') == 'Batuan' ? 'selected' : '' }}>Batuan</option>
                    <option value="Bien Unido" {{ old('location') == 'Bien Unido' ? 'selected' : '' }}>Bien Unido</option>
                    <option value="Bilar" {{ old('location') == 'Bilar' ? 'selected' : '' }}>Bilar</option>
                    <option value="Buenavista" {{ old('location') == 'Buenavista' ? 'selected' : '' }}>Buenavista</option>
                    <option value="Calape" {{ old('location') == 'Calape' ? 'selected' : '' }}>Calape</option>
                    <option value="Candijay" {{ old('location') == 'Candijay' ? 'selected' : '' }}>Candijay</option>
                    <option value="Carmen" {{ old('location') == 'Carmen' ? 'selected' : '' }}>Carmen</option>
                    <option value="Catigbian" {{ old('location') == 'Catigbian' ? 'selected' : '' }}>Catigbian</option>
                    <option value="Clarin" {{ old('location') == 'Clarin' ? 'selected' : '' }}>Clarin</option>
                    <option value="Corella" {{ old('location') == 'Corella' ? 'selected' : '' }}>Corella</option>
                    <option value="Cortes" {{ old('location') == 'Cortes' ? 'selected' : '' }}>Cortes</option>
                    <option value="Dagohoy" {{ old('location') == 'Dagohoy' ? 'selected' : '' }}>Dagohoy</option>
                    <option value="Danao" {{ old('location') == 'Danao' ? 'selected' : '' }}>Danao</option>
                    <option value="Dauis" {{ old('location') == 'Dauis' ? 'selected' : '' }}>Dauis</option>
                    <option value="Dimiao" {{ old('location') == 'Dimiao' ? 'selected' : '' }}>Dimiao</option>
                    <option value="Duero" {{ old('location') == 'Duero' ? 'selected' : '' }}>Duero</option>
                    <option value="Garcia Hernandez" {{ old('location') == 'Garcia Hernandez' ? 'selected' : '' }}>Garcia Hernandez</option>
                    <option value="Getafe" {{ old('location') == 'Getafe' ? 'selected' : '' }}>Getafe</option>
                    <option value="Guindulman" {{ old('location') == 'Guindulman' ? 'selected' : '' }}>Guindulman</option>
                    <option value="Inabanga" {{ old('location') == 'Inabanga' ? 'selected' : '' }}>Inabanga</option>
                    <option value="Jagna" {{ old('location') == 'Jagna' ? 'selected' : '' }}>Jagna</option>
                    <option value="Jetafe" {{ old('location') == 'Jetafe' ? 'selected' : '' }}>Jetafe</option>
                    <option value="Lila" {{ old('location') == 'Lila' ? 'selected' : '' }}>Lila</option>
                    <option value="Loay" {{ old('location') == 'Loay' ? 'selected' : '' }}>Loay</option>
                    <option value="Loboc" {{ old('location') == 'Loboc' ? 'selected' : '' }}>Loboc</option>
                    <option value="Loon" {{ old('location') == 'Loon' ? 'selected' : '' }}>Loon</option>
                    <option value="Mabini" {{ old('location') == 'Mabini' ? 'selected' : '' }}>Mabini</option>
                    <option value="Maribojoc" {{ old('location') == 'Maribojoc' ? 'selected' : '' }}>Maribojoc</option>
                    <option value="Panglao" {{ old('location') == 'Panglao' ? 'selected' : '' }}>Panglao</option>
                    <option value="Pilar" {{ old('location') == 'Pilar' ? 'selected' : '' }}>Pilar</option>
                    <option value="Presidente Carlos P. Garcia" {{ old('location') == 'Presidente Carlos P. Garcia' ? 'selected' : '' }}>Presidente Carlos P. Garcia</option>
                    <option value="Sagbayan" {{ old('location') == 'Sagbayan' ? 'selected' : '' }}>Sagbayan</option>
                    <option value="San Isidro" {{ old('location') == 'San Isidro' ? 'selected' : '' }}>San Isidro</option>
                    <option value="San Miguel" {{ old('location') == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
                    <option value="Sevilla" {{ old('location') == 'Sevilla' ? 'selected' : '' }}>Sevilla</option>
                    <option value="Sierra Bullones" {{ old('location') == 'Sierra Bullones' ? 'selected' : '' }}>Sierra Bullones</option>
                    <option value="Sikatuna" {{ old('location') == 'Sikatuna' ? 'selected' : '' }}>Sikatuna</option>
                    <option value="Talibon" {{ old('location') == 'Talibon' ? 'selected' : '' }}>Talibon</option>
                    <option value="Trinidad" {{ old('location') == 'Trinidad' ? 'selected' : '' }}>Trinidad</option>
                    <option value="Tubigon" {{ old('location') == 'Tubigon' ? 'selected' : '' }}>Tubigon</option>
                    <option value="Ubay" {{ old('location') == 'Ubay' ? 'selected' : '' }}>Ubay</option>
                    <option value="Valencia" {{ old('location') == 'Valencia' ? 'selected' : '' }}>Valencia</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-1">Help buyers know where you're located</p>
            <x-input-error :messages="$errors->get('location')" class="mt-1" />
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