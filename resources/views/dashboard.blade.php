<x-sidebar-layout>
    <x-slot name="title">Dashboard - TradeLink</x-slot>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex w-14 h-14 bg-gradient-to-br from-trade-blue via-blue-500 to-trade-teal rounded-2xl items-center justify-center shadow-lg shadow-blue-500/30 animate-pulse">
                    <span class="text-white font-bold text-2xl">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Welcome back, {{ auth()->user()->name }}! 👋</h1>
                    <p class="text-gray-600 mt-1 flex items-center gap-2">
                        <span>Here's what's happening with your account today</span>
                        <span class="inline-flex items-center gap-1 text-xs bg-green-50 text-green-600 px-2 py-1 rounded-full font-medium">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                            Online
                        </span>
                    </p>
                </div>
            </div>
            <a href="{{ route('items.create') }}" class="btn-primary inline-flex items-center justify-center gap-2 whitespace-nowrap shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Post New Item</span>
            </a>
        </div>
    </x-slot>

    <div class="px-4 sm:px-6 lg:px-8 py-8">

        <!-- Enhanced Stats Grid with Animations -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">

            <!-- Total Items Card -->
            <div class="group relative overflow-hidden card p-6 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 bg-gradient-to-br from-white to-blue-50/30">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-trade-blue/10 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-trade-blue to-blue-600 rounded-xl shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="flex items-center gap-1 text-xs font-semibold text-green-600">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span>+12%</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1 font-medium">Total Items</p>
                        <p class="text-4xl font-bold bg-gradient-to-r from-trade-blue to-blue-600 bg-clip-text text-transparent">{{ auth()->user()->items()->count() }}</p>
                        <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                            <span class="w-1 h-1 bg-green-500 rounded-full animate-pulse"></span>
                            Active listings
                        </p>
                    </div>
                </div>
            </div>

            <!-- Total Views Card -->
            <div class="group relative overflow-hidden card p-6 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 bg-gradient-to-br from-white to-teal-50/30">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-trade-teal/10 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-trade-teal to-teal-600 rounded-xl shadow-lg shadow-teal-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="flex items-center gap-1 text-xs font-semibold text-green-600">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span>+8%</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1 font-medium">Total Views</p>
                        <p class="text-4xl font-bold bg-gradient-to-r from-trade-teal to-teal-600 bg-clip-text text-transparent">{{ number_format(auth()->user()->items()->sum('views')) }}</p>
                        <p class="text-xs text-gray-500 mt-2">All-time impressions</p>
                    </div>
                </div>
            </div>

            <!-- Favorites Card -->
            <div class="group relative overflow-hidden card p-6 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 bg-gradient-to-br from-white to-red-50/30">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-red-500/10 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg shadow-red-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="flex items-center gap-1 text-xs font-semibold text-green-600">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span>+15%</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1 font-medium">Favorites</p>
                        <p class="text-4xl font-bold bg-gradient-to-r from-red-500 to-red-600 bg-clip-text text-transparent">
                            {{ auth()->user()->items()->withCount('favorites')->get()->sum('favorites_count') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-2">People interested</p>
                    </div>
                </div>
            </div>

            <!-- Member Since Card -->
            <div class="group relative overflow-hidden card p-6 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 bg-gradient-to-br from-white to-orange-50/30">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-deal-orange/10 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-deal-orange to-amber-600 rounded-xl shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="flex items-center gap-1 text-xs font-semibold bg-gradient-to-r from-deal-orange to-amber-600 text-white px-2 py-0.5 rounded-full">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                </svg>
                                <span>Member</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1 font-medium">Member Since</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-deal-orange to-amber-600 bg-clip-text text-transparent">{{ auth()->user()->created_at->format('M Y') }}</p>
                        <p class="text-xs text-gray-500 mt-2">{{ auth()->user()->created_at->diffForHumans(null, false, true) }} trading</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced My Items Section -->
        <div class="card p-6 sm:p-8 bg-gradient-to-br from-white via-white to-gray-50/50">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">My Active Listings</h2>
                        <span class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-trade-blue to-blue-600 text-white text-sm font-bold rounded-full shadow-lg shadow-blue-500/30">
                            {{ auth()->user()->items()->count() }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 flex items-center gap-2">
                        <svg class="w-4 h-4 text-trade-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Manage and track your posted items</span>
                    </p>
                </div>
                <a href="{{ route('items.create') }}" class="hidden sm:flex btn-secondary items-center gap-2 text-sm px-5 py-2.5 shadow-md hover:shadow-xl transition-all hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Add New</span>
                </a>
            </div>

            @if(auth()->user()->items()->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                @foreach(auth()->user()->items()->latest()->take(8)->get() as $item)
                <article class="item-card group hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <!-- Item Image -->
                    <div class="relative h-48 bg-gradient-to-br from-gray-100 to-gray-50 overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->item_name }}"
                            class="item-card-image transition-transform duration-500 group-hover:scale-110 group-hover:rotate-1">
                        @if($item->created_at->diffInHours(now()) < 24)
                            <span class="absolute top-3 right-3 badge badge-new px-3 py-1.5 text-xs font-bold shadow-lg animate-bounce">
                            ✨ NEW
                            </span>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Item Info -->
                    <div class="p-4 space-y-3">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-trade-teal bg-teal-50 px-2 py-1 rounded-full">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                    </svg>
                                    {{ $item->category }}
                                </span>
                                <span class="text-xs text-gray-400">{{ $item->created_at->diffForHumans(null, false, true) }}</span>
                            </div>
                            <h3 class="font-bold text-gray-900 text-base line-clamp-2 mb-2 group-hover:text-trade-blue transition-colors">{{ $item->item_name }}</h3>
                            <div class="flex items-baseline gap-2">
                                <p class="price-display text-2xl">${{ number_format($item->price, 2) }}</p>
                                <span class="text-xs text-gray-500 line-through">${{ number_format($item->price * 1.2, 2) }}</span>
                            </div>
                        </div>

                        <!-- Enhanced Stats -->
                        <div class="flex items-center gap-3 text-xs pt-3 border-t border-gray-100">
                            <span class="flex items-center gap-1.5 text-gray-600 hover:text-trade-teal transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span class="font-bold">{{ $item->views }}</span>
                            </span>
                            <span class="flex items-center gap-1.5 text-red-500 hover:text-red-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                                <span class="font-bold">{{ $item->favorites()->count() }}</span>
                            </span>
                            <span class="flex items-center gap-1.5 text-gray-600 hover:text-trade-blue transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span class="font-bold">{{ $item->comments()->count() }}</span>
                            </span>
                        </div>

                        <!-- Enhanced Action Buttons -->
                        <div class="flex gap-2 pt-3">
                            <a href="{{ route('items.show', $item) }}" class="flex-1 btn-secondary text-center text-sm px-3 py-2.5 font-semibold hover:scale-105 transition-transform">
                                View
                            </a>
                            <a href="{{ route('items.edit', $item) }}" class="flex-1 bg-gradient-to-r from-deal-orange to-amber-600 hover:from-amber-600 hover:to-deal-orange text-white font-bold text-center text-sm px-3 py-2.5 rounded-lg transition-all hover:scale-105 shadow-md hover:shadow-xl shadow-orange-500/30">
                                Edit
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            @if(auth()->user()->items()->count() > 8)
            <div class="mt-8 text-center pt-6 border-t border-gray-200">
                <a href="{{ route('items.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-trade-blue to-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all hover:scale-105">
                    <span>View All My Items ({{ auth()->user()->items()->count() }})</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            @endif
            @else
            <!-- Enhanced Empty State -->
            <div class="text-center py-20 px-4">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-blue-50 to-teal-50 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-12 h-12 text-trade-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-3">No items yet</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto text-lg">Start your trading journey by posting your first item. It's quick and easy!</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('items.create') }}" class="btn-primary inline-flex items-center gap-2 px-6 py-3 shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Post Your First Item</span>
                    </a>
                    <a href="{{ route('items.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white border-2 border-gray-200 text-gray-700 font-semibold rounded-lg hover:border-trade-blue hover:text-trade-blue transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span>Browse Items</span>
                    </a>
                </div>
            </div>
            @endif
        </div>

    </div>
</x-sidebar-layout>