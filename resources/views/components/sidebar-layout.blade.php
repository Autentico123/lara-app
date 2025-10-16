<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'TradeLink') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-br from-gray-50 via-blue-50/30 to-teal-50/30">
    <div class="min-h-screen flex">

        <!-- Enhanced Sidebar with Dark Theme -->
        <aside class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 bg-gradient-to-b from-gray-900 via-gray-900 to-gray-800 shadow-2xl">
            <!-- Logo with Glow Effect -->
            <div class="h-16 flex items-center px-6 border-b border-gray-700/50 flex-shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/50 group-hover:shadow-orange-500/70 transition-all duration-300 group-hover:scale-110">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div>
                        <span class="font-bold text-xl text-white group-hover:text-deal-orange transition-colors">TradeLink</span>
                        <p class="text-xs text-gray-400">Marketplace</p>
                    </div>
                </a>
            </div>

            <!-- Navigation with Modern Styling -->
            <nav class="flex-1 px-3 py-6 space-y-1.5">
                <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-trade-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                    @if(request()->routeIs('dashboard'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <a href="{{ route('items.index') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.index') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('items.index') ? 'text-white' : 'text-gray-400 group-hover:text-trade-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Browse Items</span>
                    @if(request()->routeIs('items.index'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <a href="{{ route('favorites.index') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('favorites.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('favorites.*') ? 'text-white' : 'text-gray-400 group-hover:text-red-400' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span>My Favorites</span>
                    @if(request()->routeIs('favorites.*'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-4 h-0.5 bg-gray-700 rounded-full"></span>
                        My Items
                    </p>
                </div>

                <a href="{{ route('items.create') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.create') ? 'bg-gradient-to-r from-deal-orange to-amber-600 text-white shadow-lg shadow-orange-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('items.create') ? 'text-white' : 'text-gray-400 group-hover:text-deal-orange' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Post New Item</span>
                    @if(request()->routeIs('items.create'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-4 h-0.5 bg-gray-700 rounded-full"></span>
                        Account
                    </p>
                </div>

                <a href="{{ route('profile.edit') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('profile.*') ? 'text-white' : 'text-gray-400 group-hover:text-trade-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profile Settings</span>
                    @if(request()->routeIs('profile.*'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full group flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-red-500/20 hover:text-red-400 rounded-xl font-medium transition-all duration-200 text-left">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>

            <!-- Enhanced User Profile Card -->
            <div class="p-4 border-t border-gray-700/50 flex-shrink-0 bg-gray-800/50">
                <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-gray-700/50 transition-all duration-200">
                    <div class="relative">
                        <div class="w-11 h-11 bg-gradient-to-br from-trade-blue to-trade-teal rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                            <span class="text-white font-bold text-lg">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-green-400 border-2 border-gray-900 rounded-full"></div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400 truncate">Online</p>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-64">

            <!-- Enhanced Top Navbar with Glass Effect -->
            <nav class="h-16 bg-white/95 backdrop-blur-xl border-b border-gray-200/60 flex items-center justify-between px-4 lg:px-8 sticky top-0 z-20 shadow-sm">
                <!-- Left: Mobile Menu Button + Page Title -->
                <div class="flex items-center gap-4 flex-1">
                    <!-- Mobile Menu Button (hidden on desktop) -->
                    <button id="mobile-menu-button" class="lg:hidden p-2.5 text-gray-700 hover:bg-gradient-to-br hover:from-blue-50 hover:to-teal-50 rounded-xl transition-all hover:scale-105">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Mobile Logo -->
                    <div class="lg:hidden flex items-center gap-2.5">
                        <div class="w-9 h-9 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/30">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <div>
                            <span class="font-bold text-lg text-gray-900">TradeLink</span>
                        </div>
                    </div>

                    <!-- Current Time & Date (Desktop Only) -->
                    <div class="hidden lg:flex items-center gap-2.5 px-4 py-2 bg-gradient-to-r from-blue-50 to-teal-50 rounded-xl border border-blue-100/50">
                        <div class="p-1.5 bg-white rounded-lg shadow-sm">
                            <svg class="w-4 h-4 text-trade-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span id="current-time" class="text-sm font-semibold text-gray-700"></span>
                    </div>
                </div>

                <!-- Right: Notifications & User Menu -->
                <div class="flex items-center gap-2">
                    <!-- Messages -->
                    <button class="hidden sm:flex items-center justify-center p-2.5 text-gray-600 hover:bg-gradient-to-br hover:from-teal-50 hover:to-blue-50 rounded-xl transition-all hover:scale-105 relative group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <span class="absolute -top-1 -right-1 px-1.5 py-0.5 bg-gradient-to-r from-trade-teal to-teal-600 text-white text-xs font-bold rounded-full shadow-lg shadow-teal-500/30">3</span>
                    </button>

                    <!-- Notifications -->
                    <button class="flex items-center justify-center p-2.5 text-gray-600 hover:bg-gradient-to-br hover:from-orange-50 hover:to-red-50 rounded-xl transition-all hover:scale-105 relative group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-gradient-to-br from-deal-orange to-red-500 rounded-full animate-pulse shadow-lg shadow-orange-500/50"></span>
                    </button>

                    <!-- Divider -->
                    <div class="hidden sm:block w-px h-8 bg-gradient-to-b from-transparent via-gray-300 to-transparent"></div>

                    <!-- User Menu Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2.5 p-1.5 pr-3 hover:bg-gradient-to-br hover:from-blue-50 hover:to-teal-50 rounded-xl transition-all hover:shadow-md">
                            <div class="w-10 h-10 bg-gradient-to-br from-trade-blue via-blue-500 to-trade-teal rounded-xl flex items-center justify-center ring-2 ring-white shadow-lg shadow-blue-500/30">
                                <span class="text-white font-bold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                            <div class="hidden sm:block text-left">
                                <p class="text-sm font-bold text-gray-900 leading-tight">{{ Str::limit(auth()->user()->name, 15) }}</p>
                                <p class="text-xs text-trade-teal font-semibold">View Profile</p>
                            </div>
                            <svg class="hidden sm:block w-4 h-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Enhanced Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-2xl border border-gray-200/50 overflow-hidden" style="display: none;">
                            <!-- User Info Header with Gradient -->
                            <div class="px-5 py-4 bg-gradient-to-br from-trade-blue via-blue-500 to-trade-teal relative overflow-hidden">
                                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDQwIDAgTCAwIDAgMCA0MCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLW9wYWNpdHk9IjAuMSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20"></div>
                                <div class="flex items-center gap-3 relative">
                                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-xl">
                                        <span class="text-trade-blue font-bold text-2xl">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-white truncate drop-shadow-sm">{{ auth()->user()->name }}</p>
                                        <p class="text-xs text-blue-100 truncate">{{ auth()->user()->email }}</p>
                                        <div class="flex items-center gap-1.5 mt-1">
                                            <div class="w-2 h-2 bg-green-400 rounded-full shadow-lg shadow-green-400/50"></div>
                                            <span class="text-xs text-white/90 font-medium">Online</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items with Icons -->
                            <div class="py-2">
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-teal-50 transition-all group">
                                    <div class="p-2 bg-blue-50 rounded-lg group-hover:bg-white group-hover:shadow-md transition-all">
                                        <svg class="w-4 h-4 text-trade-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </div>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-teal-50 transition-all group">
                                    <div class="p-2 bg-teal-50 rounded-lg group-hover:bg-white group-hover:shadow-md transition-all">
                                        <svg class="w-4 h-4 text-trade-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <span>Profile Settings</span>
                                </a>
                                <a href="{{ route('favorites.index') }}" class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-teal-50 transition-all group">
                                    <div class="p-2 bg-red-50 rounded-lg group-hover:bg-white group-hover:shadow-md transition-all">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </div>
                                    <span>My Favorites</span>
                                </a>
                                <a href="{{ route('items.index') }}" class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-teal-50 transition-all group">
                                    <div class="p-2 bg-orange-50 rounded-lg group-hover:bg-white group-hover:shadow-md transition-all">
                                        <svg class="w-4 h-4 text-deal-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    <span>My Items</span>
                                </a>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent my-1"></div>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 text-sm font-medium text-red-600 hover:bg-red-50 transition-all group">
                                    <div class="p-2 bg-red-50 rounded-lg group-hover:bg-red-100 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold">Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Time Update Script -->
            <script>
                function updateTime() {
                    const now = new Date();
                    const timeString = now.toLocaleTimeString('en-US', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    const dateString = now.toLocaleDateString('en-US', {
                        weekday: 'short',
                        month: 'short',
                        day: 'numeric'
                    });
                    const element = document.getElementById('current-time');
                    if (element) {
                        element.textContent = `${timeString} • ${dateString}`;
                    }
                }
                updateTime();
                setInterval(updateTime, 60000); // Update every minute
            </script>

            <!-- Page Header -->
            @if(isset($header))
            <div class="bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8 py-6">
                {{ $header }}
            </div>
            @endif

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto">
                {{ $slot }}
            </main>

        </div>
    </div>

    <!-- Mobile Menu Overlay with Dark Theme -->
    <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-50 hidden">
        <div class="fixed inset-y-0 left-0 w-72 bg-gradient-to-b from-gray-900 via-gray-900 to-gray-800 shadow-2xl">
            <!-- Mobile Menu Header -->
            <div class="h-16 flex items-center justify-between px-4 border-b border-gray-700/50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div>
                        <span class="font-bold text-xl text-white">TradeLink</span>
                        <p class="text-xs text-gray-400">Marketplace</p>
                    </div>
                </div>
                <button id="mobile-menu-close" class="p-2 text-gray-400 hover:bg-gray-800 rounded-lg transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation with Dark Theme -->
            <nav class="p-3 space-y-1.5 overflow-y-auto h-[calc(100vh-8rem)]">
                <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-trade-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                    @if(request()->routeIs('dashboard'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <a href="{{ route('items.index') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.index') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('items.index') ? 'text-white' : 'text-gray-400 group-hover:text-trade-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Browse Items</span>
                    @if(request()->routeIs('items.index'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <a href="{{ route('favorites.index') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('favorites.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('favorites.*') ? 'text-white' : 'text-gray-400 group-hover:text-red-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span>My Favorites</span>
                    @if(request()->routeIs('favorites.*'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-4 h-0.5 bg-gray-700 rounded-full"></span>
                        My Items
                    </p>
                </div>

                <a href="{{ route('items.create') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.create') ? 'bg-gradient-to-r from-deal-orange to-amber-600 text-white shadow-lg shadow-orange-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('items.create') ? 'text-white' : 'text-gray-400 group-hover:text-deal-orange' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Post New Item</span>
                    @if(request()->routeIs('items.create'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-4 h-0.5 bg-gray-700 rounded-full"></span>
                        Account
                    </p>
                </div>

                <a href="{{ route('profile.edit') }}" class="group flex items-center gap-3 px-4 py-3 {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} rounded-xl font-medium transition-all duration-200">
                    <svg class="w-5 h-5 {{ request()->routeIs('profile.*') ? 'text-white' : 'text-gray-400 group-hover:text-trade-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profile Settings</span>
                    @if(request()->routeIs('profile.*'))
                    <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full group flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-red-500/20 hover:text-red-400 rounded-xl font-medium transition-all duration-200 text-left">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>

            <!-- Mobile User Card -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700/50 bg-gray-800/50">
                <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-gray-700/50 transition-all duration-200">
                    <div class="relative">
                        <div class="w-11 h-11 bg-gradient-to-br from-trade-blue to-trade-teal rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                            <span class="text-white font-bold text-lg">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-green-400 border-2 border-gray-900 rounded-full"></div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400 truncate">Online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
            });

            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            }

            mobileMenu.addEventListener('click', (e) => {
                if (e.target === mobileMenu) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }
    </script>
</body>

</html>