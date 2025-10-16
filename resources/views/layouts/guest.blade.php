<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen h-screen flex bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 overflow-hidden">
        <!-- Left Side - Branding -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 p-12 flex-col justify-between relative overflow-hidden">
            <!-- Animated Background Circles -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-deal-orange/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-trade-teal/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/3 w-72 h-72 bg-trade-blue/15 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>

            <div class="relative z-10">
                <!-- Logo -->
                <a href="/" class="inline-flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl shadow-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <span class="text-3xl font-bold text-white">TradeLink</span>
                </a>

                <!-- Tagline -->
                <div class="mt-16 space-y-6">
                    <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                        Buy, Sell & Trade<br>in Your Community
                    </h2>
                    <p class="text-lg text-gray-300 max-w-md">
                        Join thousands of users trading locally. List items for free, discover great deals, and connect with your community.
                    </p>
                </div>

                <!-- Key Benefits -->
                <div class="mt-12 space-y-6">
                    <div class="flex items-start gap-4 group">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-deal-orange/20 to-amber-500/20 rounded-xl flex items-center justify-center border border-deal-orange/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-deal-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white mb-1">Quick & Easy</h3>
                            <p class="text-sm text-gray-400">Post items in seconds and start trading immediately with your local community.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 group">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-trade-blue/20 to-blue-500/20 rounded-xl flex items-center justify-center border border-trade-blue/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-trade-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white mb-1">100% Free</h3>
                            <p class="text-sm text-gray-400">No listing fees, no hidden charges. Keep all your profits from every sale.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 group">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-trade-teal/20 to-teal-500/20 rounded-xl flex items-center justify-center border border-trade-teal/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-trade-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white mb-1">Local Community</h3>
                            <p class="text-sm text-gray-400">Connect with buyers and sellers in your area for safe, convenient transactions.</p>
                        </div>
                    </div>
                </div>

                <!-- Trust Badge -->
                <div class="mt-12 p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-white">Trusted Platform</p>
                            <p class="text-xs text-gray-400">Safe, secure, and built for your community</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Auth Form -->
        <div class="flex-1 p-6 sm:p-12 overflow-y-auto">
            <div class="w-full max-w-md mx-auto py-8">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <a href="/" class="inline-flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl shadow-lg flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-deal-orange via-amber-500 to-yellow-500 bg-clip-text text-transparent">TradeLink</span>
                    </a>
                </div>

                <!-- Form Container -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-orange-100">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>