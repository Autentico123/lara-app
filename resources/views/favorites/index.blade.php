<x-sidebar-layout>
  <x-slot name="title">My Favorites - TradeLink</x-slot>

  <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div>
        <h1 class="text-3xl font-bold text-gray-900">My Favorites ❤️</h1>
        <p class="text-gray-600 mt-1">Items you've saved for later</p>
      </div>
      <a href="{{ route('items.index') }}" class="btn-primary inline-flex items-center justify-center gap-2 whitespace-nowrap">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <span>Browse More Items</span>
      </a>
    </div>
  </x-slot>

  <div class="px-4 sm:px-6 lg:px-8 py-8">

    @if($favorites->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 mb-8">
      @foreach($favorites as $favorite)
      @php
      $item = $favorite->item;
      @endphp

      @if($item)
      <article class="item-card group relative">
        <!-- Item Image -->
        <div class="relative h-48 bg-gray-100 overflow-hidden">
          <a href="{{ route('items.show', $item) }}">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" class="item-card-image transition-transform duration-300 group-hover:scale-110">
          </a>
          @if($item->created_at->diffInHours(now()) < 24)
            <span class="absolute top-3 right-3 badge badge-new px-3 py-1 text-xs font-bold shadow-sm">✨ NEW</span>
            @endif

            <!-- Favorite Button -->
            <form action="{{ route('favorites.toggle', $item) }}" method="POST" class="absolute top-3 left-3">
              @csrf
              <button type="submit" class="bg-white hover:bg-red-50 rounded-full p-2 shadow-md transition-all duration-200 hover:scale-110">
                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
              </button>
            </form>
        </div>

        <!-- Item Info -->
        <div class="p-4 space-y-3">
          <div>
            <p class="text-xs text-gray-500 mb-1">{{ $item->category }}</p>
            <a href="{{ route('items.show', $item) }}">
              <h3 class="font-semibold text-gray-900 text-sm line-clamp-2 mb-2 hover:text-trade-blue">{{ $item->item_name }}</h3>
            </a>
            <p class="price-display">${{ number_format($item->price, 2) }}</p>
          </div>

          <!-- Seller & Stats -->
          <div class="flex items-center gap-2 text-xs pt-2 border-t border-gray-100">
            <img src="{{ $item->user->avatarUrl() }}" alt="{{ $item->user->name }}" class="w-6 h-6 rounded-full ring-2 ring-gray-100">
            <span class="text-gray-700 font-medium truncate flex-1">{{ $item->user->name }}</span>
            <span class="flex items-center gap-1 text-gray-600">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              {{ $item->views }}
            </span>
          </div>

          <!-- Location & Time -->
          <div class="text-xs text-gray-500 flex items-center gap-2">
            @if($item->location)
            <span class="flex items-center gap-1">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              {{ $item->location }}
            </span>
            @endif
            <span>•</span>
            <span>{{ $item->created_at->diffForHumans() }}</span>
          </div>

          <!-- Favorited Badge -->
          <div class="text-xs text-red-500 flex items-center gap-1 bg-red-50 px-2 py-1 rounded">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
            <span class="font-medium">Saved {{ $favorite->created_at->diffForHumans() }}</span>
          </div>
        </div>
      </article>
      @endif
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
      {{ $favorites->links() }}
    </div>
    @else
    <!-- Empty State -->
    <div class="card p-16 text-center">
      <div class="inline-flex items-center justify-center w-20 h-20 bg-red-50 rounded-full mb-6">
        <svg class="w-10 h-10 text-red-400" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
      </div>
      <h3 class="text-2xl font-bold text-gray-900 mb-2">No favorites yet</h3>
      <p class="text-gray-600 mb-8 max-w-md mx-auto">Start exploring and save items you like by clicking the heart icon!</p>
      <a href="{{ route('items.index') }}" class="btn-primary inline-flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <span>Browse Items</span>
      </a>
    </div>
    @endif

  </div>
</x-sidebar-layout>