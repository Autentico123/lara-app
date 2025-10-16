<x-sidebar-layout>
  <x-slot name="title">Browse Items - TradeLink</x-slot>

  <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="flex items-center gap-4">
        <div class="p-3 bg-gradient-to-br from-trade-blue to-blue-600 rounded-2xl shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
        </div>
        <div>
          <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Browse Items 🛍️</h1>
          <p class="text-gray-600 mt-1">Discover amazing items from our community</p>
        </div>
      </div>
      @auth
      <a href="{{ route('items.create') }}" class="btn-primary inline-flex items-center justify-center gap-2 whitespace-nowrap shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-105 transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span>Post Item</span>
      </a>
      @endauth
    </div>
  </x-slot>

  <div class="px-4 sm:px-6 lg:px-8 py-8">

    <!-- Search and Filters -->
    <div class="card p-4 sm:p-6 mb-6 bg-gradient-to-br from-white via-white to-blue-50/30 shadow-lg">
      <form action="{{ route('items.index') }}" method="GET" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <!-- Search -->
          <div class="md:col-span-2">
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </div>
              <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search items..."
                class="form-input w-full pl-10 bg-white border-gray-200 focus:border-trade-blue focus:ring-trade-blue shadow-sm">
            </div>
          </div>

          <!-- Category Filter -->
          <div>
            <select name="category" class="form-input w-full bg-white border-gray-200 focus:border-trade-blue focus:ring-trade-blue shadow-sm">
              <option value="">All Categories</option>
              <option value="Electronics" {{ request('category') == 'Electronics' ? 'selected' : '' }}>📱 Electronics</option>
              <option value="Fashion" {{ request('category') == 'Fashion' ? 'selected' : '' }}>👕 Fashion</option>
              <option value="Home & Garden" {{ request('category') == 'Home & Garden' ? 'selected' : '' }}>🏠 Home & Garden</option>
              <option value="Sports & Outdoors" {{ request('category') == 'Sports & Outdoors' ? 'selected' : '' }}>⚽ Sports & Outdoors</option>
              <option value="Toys & Games" {{ request('category') == 'Toys & Games' ? 'selected' : '' }}>🎮 Toys & Games</option>
              <option value="Books & Media" {{ request('category') == 'Books & Media' ? 'selected' : '' }}>📚 Books & Media</option>
              <option value="Automotive" {{ request('category') == 'Automotive' ? 'selected' : '' }}>🚗 Automotive</option>
              <option value="Health & Beauty" {{ request('category') == 'Health & Beauty' ? 'selected' : '' }}>💄 Health & Beauty</option>
              <option value="Pets" {{ request('category') == 'Pets' ? 'selected' : '' }}>🐾 Pets</option>
              <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>📦 Other</option>
            </select>
          </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
          <!-- Sort -->
          <select name="sort" onchange="this.form.submit()" class="form-input w-full sm:w-auto bg-white border-gray-200 focus:border-trade-blue focus:ring-trade-blue shadow-sm">
            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Viewed</option>
          </select>

          <!-- Search Button -->
          <button type="submit" class="btn-primary w-full sm:w-auto shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-105 transition-all">
            <span class="inline-flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
              Search
            </span>
          </button>
        </div>

        @if(request()->hasAny(['search', 'category', 'sort']))
        <div class="text-center pt-2">
          <a href="{{ route('items.index') }}" class="text-gray-600 hover:text-trade-blue text-sm font-medium transition-colors inline-flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Clear Filters
          </a>
        </div>
        @endif
      </form>
    </div>

    <!-- Results Count -->
    @if($items->count() > 0)
    <div class="mb-6 flex items-center justify-between">
      <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-50 to-teal-50 rounded-full border border-blue-200/50">
        <svg class="w-5 h-5 text-trade-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <p class="text-sm text-gray-700">
          Showing <span class="font-bold text-gray-900">{{ $items->firstItem() }} - {{ $items->lastItem() }}</span> of <span class="font-bold text-gray-900">{{ $items->total() }}</span> items
        </p>
      </div>
    </div>

    <!-- Items Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 mb-8">
      @foreach($items as $item)
      <article class="item-card group hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
        <a href="{{ route('items.show', $item) }}" class="block">
          <!-- Item Image -->
          <div class="relative h-48 sm:h-56 bg-gray-100 overflow-hidden">
            <img
              src="{{ asset('storage/' . $item->image) }}"
              alt="{{ $item->item_name }}"
              class="item-card-image transition-transform duration-500 group-hover:scale-110 group-hover:rotate-1"
              loading="lazy">

            <!-- NEW Badge -->
            @if($item->created_at->diffInHours(now()) < 24)
              <span class="absolute top-3 right-3 badge badge-new px-3 py-1 text-xs font-bold shadow-lg backdrop-blur-sm bg-opacity-90 animate-bounce">
              ✨ NEW
              </span>
              @endif
          </div>

          <!-- Item Info -->
          <div class="item-card-content space-y-2">
            <!-- Category & Favorites -->
            <div class="flex items-center justify-between text-xs">
              <span class="badge badge-category inline-flex items-center gap-1">
                {{ $item->category }}
              </span>
              @if($item->favoritesCount() > 0)
              <span class="flex items-center gap-1 text-gray-500 hover:text-red-500 transition-colors">
                <span class="text-red-500">❤</span>
                <span class="font-bold">{{ $item->favoritesCount() }}</span>
              </span>
              @endif
            </div>

            <!-- Title -->
            <h3 class="font-semibold text-gray-900 text-base sm:text-lg line-clamp-2 group-hover:text-trade-blue transition-colors">
              {{ $item->item_name }}
            </h3>

            <!-- Price -->
            <p class="price-display text-2xl">
              ${{ number_format($item->price, 2) }}
            </p>

            <!-- Seller -->
            <div class="flex items-center gap-2 pt-2 border-t border-gray-100">
              <img
                src="{{ $item->user->avatarUrl() }}"
                alt="{{ $item->user->name }}"
                class="w-7 h-7 rounded-full ring-2 ring-gray-100 group-hover:ring-trade-blue transition-all">
              <span class="text-sm text-gray-700 font-medium truncate flex-1">
                {{ $item->user->name }}
              </span>
            </div>

            <!-- Location & Time & Views -->
            <div class="flex items-center justify-between text-xs text-gray-500 pt-1">
              <div class="flex items-center gap-1 truncate flex-1">
                @if($item->location)
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                </svg>
                <span class="truncate">{{ $item->location }}</span>
                @endif
              </div>
              <div class="flex items-center gap-3 flex-shrink-0">
                @if($item->views > 0)
                <span class="flex items-center gap-1 hover:text-trade-teal transition-colors">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <span class="font-medium">{{ $item->views }}</span>
                </span>
                @endif
                <span class="text-gray-400">{{ $item->created_at->diffForHumans(null, false, true) }}</span>
              </div>
            </div>
          </div>
        </a>
      </article>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
      {{ $items->links() }}
    </div>
    @else
    <!-- Empty State -->
    <div class="card p-12 text-center bg-gradient-to-br from-white via-white to-gray-50/50">
      <div class="text-6xl mb-4">�</div>
      <h3 class="text-2xl font-bold text-gray-900 mb-2">No items found</h3>
      <p class="text-gray-600 mb-6 max-w-md mx-auto">
        @if(request()->hasAny(['search', 'category']))
        Try adjusting your search or filters to find what you're looking for.
        @else
        Be the first to start trading in your community!
        @endif
      </p>
      @auth
      <a href="{{ route('items.create') }}" class="btn-primary inline-flex items-center gap-2">
        <span>+</span>
        <span>Post Your First Item</span>
      </a>
      @else
      <div class="space-y-3">
        <a href="{{ route('register') }}" class="btn-primary inline-flex items-center gap-2">
          <span>🚀</span>
          <span>Sign Up to Start Trading</span>
        </a>
        <p class="text-sm text-gray-500">
          Already have an account?
          <a href="{{ route('login') }}" class="text-trade-blue hover:underline font-medium">Sign in</a>
        </p>
      </div>
      @endauth
    </div>
    @endif

  </div>
</x-sidebar-layout>