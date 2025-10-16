<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TradeLink - Buy, Sell, Trade in Your Community</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 min-h-screen">
    <nav class="bg-white/95 backdrop-blur-xl border-b border-orange-200/50 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl shadow-lg shadow-orange-500/50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-deal-orange via-amber-500 to-yellow-500 bg-clip-text text-transparent">TradeLink</h1>
                </div>
                <div class="flex items-center gap-3">
                    @auth
                    <a href="{{ route('dashboard') }}" class="btn-secondary text-sm px-4 py-2">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-deal-orange font-medium transition-colors text-sm">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-primary text-sm px-4 py-2 shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 hover:scale-105 transition-all">Get Started</a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <!-- Hero Section - Minimized View -->
    <section class="relative overflow-hidden py-12 sm:py-16 lg:py-20">
        <!-- Animated Background Gradients -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-deal-orange/20 to-transparent rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-gradient-to-tr from-amber-500/20 to-transparent rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-yellow-400/15 to-transparent rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="text-center lg:text-left space-y-4">
                    <!-- Trust Badge - Smaller -->
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-gradient-to-r from-orange-50 via-amber-50 to-yellow-50 rounded-full border border-orange-200/50 mb-3 shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </span>
                        <span class="text-xs font-bold text-gray-700">🎉 Join 10,000+ Traders</span>
                    </div>

                    <!-- Main Heading - Reduced Size -->
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">
                        <span class="block bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 bg-clip-text text-transparent mb-1 hover:scale-105 transition-transform duration-300 inline-block">Buy, Sell & Trade</span>
                        <span class="block bg-gradient-to-r from-deal-orange via-amber-500 to-yellow-500 bg-clip-text text-transparent animate-gradient bg-300% hover:scale-105 transition-transform duration-300 inline-block">in Your Community</span>
                    </h1>

                    <!-- Subheading - Reduced Size -->
                    <p class="text-sm sm:text-base lg:text-lg text-gray-600 max-w-xl leading-relaxed">
                        Connect with <span class="font-semibold text-deal-orange">local buyers</span> and <span class="font-semibold text-amber-600">sellers</span>. List items <span class="font-semibold text-yellow-600">free</span> and discover great deals.
                    </p>

                    <!-- Feature Pills - Smaller -->
                    <div class="flex flex-wrap gap-2 justify-center lg:justify-start">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white rounded-full shadow-md text-xs font-medium text-gray-700 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            100% Free
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white rounded-full shadow-md text-xs font-medium text-gray-700 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-3 h-3 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            Local Trading
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white rounded-full shadow-md text-xs font-medium text-gray-700 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-3 h-3 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Safe & Secure
                        </span>
                    </div>
                    <!-- CTA Buttons - Reduced Size -->
                    <div class="flex flex-col sm:flex-row items-center gap-3 justify-center lg:justify-start">
                        @guest
                        <a href="{{ route('register') }}" class="group w-full sm:w-auto btn-primary px-6 py-3 text-base font-semibold shadow-xl shadow-orange-500/40 hover:shadow-orange-500/60 hover:scale-105 transition-all duration-300 relative overflow-hidden">
                            <span class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative inline-flex items-center gap-2">
                                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Start Trading Free
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ route('login') }}" class="group w-full sm:w-auto btn-secondary px-6 py-3 text-base font-semibold hover:scale-105 hover:shadow-lg transition-all duration-300 relative overflow-hidden">
                            <span class="absolute inset-0 bg-gradient-to-r from-gray-100 to-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative inline-flex items-center gap-2">
                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Sign In
                            </span>
                        </a>
                        @else
                        <a href="{{ route('items.create') }}" class="group w-full sm:w-auto btn-primary px-6 py-3 text-base font-semibold shadow-xl shadow-orange-500/40 hover:shadow-orange-500/60 hover:scale-105 transition-all duration-300 relative overflow-hidden">
                            <span class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative inline-flex items-center gap-2">
                                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Post Your Item
                            </span>
                        </a>
                        <a href="{{ route('items.index') }}" class="group w-full sm:w-auto btn-secondary px-6 py-3 text-base font-semibold hover:scale-105 hover:shadow-lg transition-all duration-300">
                            <span class="inline-flex items-center gap-2">
                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Browse Items
                            </span>
                        </a>
                        @endguest
                    </div>
                </div>

                <!-- Hero Image/Mockup - Simple & Small -->
                <div class="relative hidden lg:block">
                    <!-- Simple Container -->
                    <div class="relative rounded-xl overflow-hidden shadow-lg border border-orange-200 bg-white">
                        <!-- Small Header Bar -->
                        <div class="bg-gradient-to-r from-deal-orange to-amber-500 p-3 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                    </svg>
                                </div>
                                <span class="text-white text-xs font-semibold">TradeLink</span>
                            </div>
                            <div class="flex gap-1">
                                <div class="w-2 h-2 bg-white/40 rounded-full"></div>
                                <div class="w-2 h-2 bg-white/40 rounded-full"></div>
                                <div class="w-2 h-2 bg-white/40 rounded-full"></div>
                            </div>
                        </div>

                        <!-- Simple Content Area -->
                        <div class="p-4 space-y-3">
                            <!-- Item Preview 1 -->
                            <div class="flex items-center gap-3 p-2 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-500 rounded-lg flex items-center justify-center text-xl">
                                    📱
                                </div>
                                <div class="flex-1">
                                    <div class="h-2 bg-gray-300 rounded w-20 mb-1.5"></div>
                                    <div class="h-2.5 bg-gradient-to-r from-trade-blue to-blue-600 rounded w-14"></div>
                                </div>
                                <span class="text-xs bg-red-500 text-white px-2 py-0.5 rounded-full font-bold">NEW</span>
                            </div>

                            <!-- Item Preview 2 -->
                            <div class="flex items-center gap-3 p-2 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-400 to-teal-500 rounded-lg flex items-center justify-center text-xl">
                                    🏠
                                </div>
                                <div class="flex-1">
                                    <div class="h-2 bg-gray-300 rounded w-16 mb-1.5"></div>
                                    <div class="h-2.5 bg-gradient-to-r from-trade-teal to-teal-600 rounded w-12"></div>
                                </div>
                            </div>

                            <!-- Item Preview 3 -->
                            <div class="flex items-center gap-3 p-2 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-500 rounded-lg flex items-center justify-center text-xl">
                                    ⚽
                                </div>
                                <div class="flex-1">
                                    <div class="h-2 bg-gray-300 rounded w-18 mb-1.5"></div>
                                    <div class="h-2.5 bg-gradient-to-r from-deal-orange to-orange-600 rounded w-10"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    </section>
    <!-- Categories Section with Enhanced Design -->
    <section class="relative py-20 bg-gradient-to-b from-orange-50 via-amber-50/30 to-yellow-50/30 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-deal-orange/10 to-transparent rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-gradient-to-br from-amber-400/10 to-transparent rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Enhanced Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-orange-50 rounded-full border border-orange-200/50 mb-4">
                    <span class="text-2xl animate-bounce">🏷️</span>
                    <span class="text-sm font-semibold text-deal-orange">Popular Categories</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Browse by <span class="bg-gradient-to-r from-deal-orange to-amber-500 bg-clip-text text-transparent">Category</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Find exactly what you're looking for in our curated categories</p>
            </div>

            <!-- Enhanced Category Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6">
                <!-- Electronics -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100">
                    <!-- Glow Effect on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-deal-orange/0 to-amber-500/0 group-hover:from-deal-orange/10 group-hover:to-amber-500/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-orange-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-deal-orange to-amber-500 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-orange-500/50">
                            📱
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-deal-orange transition-colors">Electronics</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Gadgets & Tech</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-deal-orange opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Fashion -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.1s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-pink-500/0 to-purple-600/0 group-hover:from-pink-500/10 group-hover:to-purple-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-pink-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-pink-500 to-purple-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-pink-500/50">
                            👕
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-pink-600 transition-colors">Fashion</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Clothing & Accessories</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Home & Garden -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.2s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/0 to-teal-600/0 group-hover:from-green-500/10 group-hover:to-teal-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-green-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-green-500/50">
                            🏠
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-green-600 transition-colors">Home & Garden</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Furniture & Decor</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-green-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Sports -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.3s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/0 to-red-600/0 group-hover:from-orange-500/10 group-hover:to-red-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-orange-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-orange-500/50">
                            ⚽
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-orange-600 transition-colors">Sports</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Equipment & Gear</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-orange-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Toys & Games -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.4s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/0 to-orange-600/0 group-hover:from-yellow-500/10 group-hover:to-orange-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-yellow-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-yellow-500/50">
                            🎮
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-yellow-600 transition-colors">Toys & Games</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Fun for All Ages</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-yellow-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Books -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.5s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/0 to-yellow-600/0 group-hover:from-amber-500/10 group-hover:to-yellow-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-amber-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-amber-500/50">
                            📚
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-amber-600 transition-colors">Books</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Read & Learn</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-amber-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Automotive -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.6s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-700/0 to-gray-900/0 group-hover:from-gray-700/10 group-hover:to-gray-900/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-gray-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-gray-700 to-gray-900 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-gray-700/50">
                            🚗
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-gray-700 transition-colors">Automotive</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Cars & Parts</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-gray-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Beauty -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.7s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-rose-500/0 to-pink-600/0 group-hover:from-rose-500/10 group-hover:to-pink-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-rose-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-rose-500/50">
                            💄
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-rose-600 transition-colors">Beauty</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Cosmetics & Care</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-rose-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Pets -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.8s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/0 to-purple-600/0 group-hover:from-indigo-500/10 group-hover:to-purple-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-indigo-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-indigo-500/50">
                            🐾
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-indigo-600 transition-colors">Pets</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Pet Supplies</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Other -->
                <a href="#" class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 text-center overflow-hidden border border-gray-100" style="animation-delay: 0.9s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-500/0 to-gray-600/0 group-hover:from-slate-500/10 group-hover:to-gray-600/10 transition-all duration-300 rounded-2xl"></div>
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-slate-400/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 bg-gradient-to-br from-slate-500 to-gray-600 rounded-2xl flex items-center justify-center text-3xl sm:text-4xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-lg shadow-slate-500/50">
                            📦
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1 group-hover:text-slate-600 transition-colors">Other</h3>
                        <p class="text-xs sm:text-sm text-gray-600">Everything Else</p>
                        <div class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-slate-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Explore</span>
                            <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- View All Categories Button -->
            <div class="text-center mt-12">
                <a href="#" class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-gray-900 to-gray-800 text-white font-semibold rounded-full shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    <span>View All Categories</span>
                    <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl shadow-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">TradeLink</h3>
                    </div>
                    <p class="text-gray-400 text-sm">Connecting communities through trusted local trading.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('items.index') }}" class="hover:text-deal-orange transition-colors">Browse Items</a></li>
                        <li><a href="#features" class="hover:text-deal-orange transition-colors">Features</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Support</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-deal-orange transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-deal-orange transition-colors">Safety Tips</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-deal-orange transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-deal-orange transition-colors">Privacy Policy</a></li>
</body>

</html>