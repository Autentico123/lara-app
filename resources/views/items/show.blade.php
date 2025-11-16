<x-sidebar-layout>
  <x-slot name="title">{{ $item->item_name }} - TradeLink</x-slot>

  <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="flex items-center gap-4">
        <a href="{{ route('items.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </a>
        <div>
          <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $item->item_name }}</h1>
          <p class="text-gray-600 mt-1">{{ $item->category }}</p>
        </div>
      </div>
      @auth
      @can('update', $item)
      <div class="flex gap-2">
        <a href="{{ route('items.edit', $item) }}" class="btn-secondary flex items-center gap-2 text-sm px-4 py-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
          Edit
        </a>
        <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-danger flex items-center gap-2 text-sm px-4 py-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Delete
          </button>
        </form>
      </div>
      @endcan
      @endauth
    </div>
  </x-slot>

  <div class="px-4 sm:px-6 lg:px-8 py-8">

    <!-- Success Messages -->
    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm">
      <div class="flex items-center gap-2">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span class="font-medium">{{ session('success') }}</span>
      </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

      <!-- Left Column: Image & Details (2/3 width on desktop) -->
      <div class="lg:col-span-2 space-y-6">

        <!-- Item Image -->
        <div class="card overflow-hidden">
          <div class="relative bg-gray-100 group">
            <img
              src="{{ asset('storage/' . $item->image) }}"
              alt="{{ $item->item_name }}"
              class="w-full h-64 sm:h-96 lg:h-[500px] object-contain bg-white">
            <!-- NEW Badge Overlay -->
            @if($item->created_at->diffInHours(now()) < 24)
              <div class="absolute top-4 right-4 badge badge-new px-3 py-1.5 text-sm font-bold shadow-lg backdrop-blur-sm bg-opacity-95">
              ✨ NEW
          </div>
          @endif
        </div>
      </div>

      <!-- Item Details Card -->
      <div class="card p-6 space-y-6">

        <!-- Category & Engagement -->
        <div class="flex items-center justify-between">
          <span class="badge badge-category text-sm px-3 py-1.5 flex items-center gap-1.5">
            <span>{{ $item->category }}</span>
          </span>
          <div class="flex items-center gap-4 text-sm text-gray-500">
            <span class="flex items-center gap-1.5">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <span class="font-medium">{{ $item->views }}</span>
            </span>
            <span class="flex items-center gap-1.5 text-gray-400">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ $item->created_at->diffForHumans() }}</span>
            </span>
          </div>
        </div>

        <!-- Title -->
        <div>
          <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 leading-tight">{{ $item->item_name }}</h1>
        </div>

        <!-- Price & Favorite -->
        <div class="flex items-center justify-between py-4 border-y border-gray-200">
          <div>
            <p class="text-sm text-gray-500 mb-1">Price</p>
            <div class="flex items-center gap-2">
              <p class="price-display-large">₱{{ number_format($item->price, 2) }}</p>
              @if($item->negotiable)
              <span class="badge badge-primary text-xs px-2 py-1">Negotiable</span>
              @endif
            </div>
          </div>

          @auth
          <form action="{{ route('favorites.toggle', $item) }}" method="POST" class="favorite-form">
            @csrf
            <button type="submit" class="favorite-btn flex flex-col items-center gap-1 px-6 py-3 rounded-lg transition-all duration-200 {{ $item->isFavoritedBy(auth()->user()) ? 'bg-red-50 text-red-600 hover:bg-red-100' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
              <span class="text-3xl {{ $item->isFavoritedBy(auth()->user()) ? 'favorite-active' : '' }}">{{ $item->isFavoritedBy(auth()->user()) ? '❤️' : '🤍' }}</span>
              <span class="text-sm font-semibold favorite-count">{{ $item->favoritesCount() }} {{ $item->favoritesCount() == 1 ? 'like' : 'likes' }}</span>
            </button>
          </form>
          @else
          <a href="{{ route('login') }}" class="flex flex-col items-center gap-1 px-6 py-3 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-lg transition-all duration-200">
            <span class="text-3xl">🤍</span>
            <span class="text-sm font-semibold">{{ $item->favoritesCount() }} {{ $item->favoritesCount() == 1 ? 'like' : 'likes' }}</span>
          </a>
          @endauth
        </div>

        <!-- Item Specifications -->
        @if($item->condition || $item->brand || $item->model)
        <div class="bg-gradient-to-br from-blue-50 to-teal-50 rounded-xl p-4">
          <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
            <svg class="w-4 h-4 text-trade-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Item Details
          </h3>
          <div class="space-y-2 text-sm">
            @if($item->condition)
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Condition:</span>
              <span class="font-semibold text-gray-900">{{ $item->condition }}</span>
            </div>
            @endif
            @if($item->brand)
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Brand:</span>
              <span class="font-semibold text-gray-900">{{ $item->brand }}</span>
            </div>
            @endif
            @if($item->model)
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Model:</span>
              <span class="font-semibold text-gray-900">{{ $item->model }}</span>
            </div>
            @endif
          </div>
        </div>
        @endif

        <!-- Location -->
        @if($item->location)
        <div class="flex items-center gap-2 text-gray-600">
          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="font-medium">{{ $item->location }}</span>
        </div>
        @endif

        <!-- Description -->
        <div class="pt-4">
          <h2 class="text-xl font-bold text-gray-900 mb-3">Description</h2>
          <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $item->description }}</p>
        </div>
      </div>

      <!-- Comments Section -->
      <div class="card p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
          <svg class="w-6 h-6 text-trade-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
          </svg>
          <span>Comments (<span id="comments-count">{{ $item->comments->count() }}</span>)</span>
        </h2>

        <!-- Comment Form -->
        @auth
        <form action="{{ route('comments.store', $item) }}" method="POST" class="mb-6" id="comment-form">
          @csrf
          <div class="flex gap-3">
            <img src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->name }}" class="w-10 h-10 rounded-full ring-2 ring-gray-100">
            <div class="flex-1">
              <textarea
                name="message"
                id="comment-message"
                rows="3"
                placeholder="Share your thoughts..."
                class="form-textarea w-full resize-none"
                required></textarea>
              @error('message')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
              <button type="submit" class="btn-primary mt-2 text-sm px-4 py-2">
                Post Comment
              </button>
            </div>
          </div>
        </form>
        @else
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6 text-center">
          <p class="text-gray-600">
            <a href="{{ route('login') }}" class="text-trade-blue hover:underline font-semibold">Sign in</a> to join the conversation
          </p>
        </div>
        @endauth

        <!-- Comments List -->
        <div class="space-y-4" id="comments-list">
          @forelse($item->comments as $comment)
          <div class="flex gap-3 pb-4 border-b border-gray-100 last:border-0" data-comment-id="{{ $comment->id }}">
            <img src="{{ $comment->user->avatarUrl() }}" alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full ring-2 ring-gray-100 flex-shrink-0">
            <div class="flex-1 min-w-0">
              <div class="flex items-start justify-between gap-2 mb-2">
                <div>
                  <span class="font-semibold text-gray-900">{{ $comment->user->name }}</span>
                  <span class="text-xs text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                @auth
                @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="delete-comment-form" onsubmit="return confirm('Delete this comment?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium transition-colors">
                    Delete
                  </button>
                </form>
                @endif
                @endauth
              </div>
              <p class="text-gray-700 text-sm leading-relaxed">{{ $comment->message }}</p>
            </div>
          </div>
          @empty
          <div class="text-center py-8" id="no-comments">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <p class="text-gray-500 font-medium">No comments yet</p>
            <p class="text-gray-400 text-sm mt-1">Be the first to share your thoughts!</p>
          </div>
          @endforelse
        </div>
      </div>

    </div>

    <!-- Right Column: Seller & Actions (1/3 width on desktop) -->
    <div class="space-y-6">

      <!-- Seller Card -->
      <div class="card p-6 sticky top-6">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Seller</h2>

        <div class="flex items-center gap-3 mb-4">
          <img src="{{ $item->user->avatarUrl() }}" alt="{{ $item->user->name }}" class="w-14 h-14 rounded-full ring-4 ring-gray-100">
          <div class="flex-1 min-w-0">
            <h3 class="font-bold text-gray-900 truncate">{{ $item->user->name }}</h3>
            @if($item->user->location)
            <p class="text-sm text-gray-500 flex items-center gap-1 truncate">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              </svg>
              {{ $item->user->location }}
            </p>
            @endif
          </div>
        </div>

        @if($item->user->bio)
        <p class="text-gray-600 text-sm mb-4 pb-4 border-b border-gray-100 line-clamp-3">{{ $item->user->bio }}</p>
        @endif

        <!-- Preferred Contact Method -->
        @if($item->contact_method)
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
          <p class="text-xs font-semibold text-blue-700 mb-1">Preferred Contact:</p>
          <p class="text-sm font-bold text-blue-900">
            @if($item->contact_method === 'messenger')
            <span class="flex items-center gap-1.5">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.974 12-11.11C24 4.975 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8l3.131 3.259L19.752 8l-6.561 6.963z" />
              </svg>
              Messenger
            </span>
            @elseif($item->contact_method === 'facebook')
            <span class="flex items-center gap-1.5">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
              Facebook
            </span>
            @else
            Messenger & Facebook
            @endif
          </p>
        </div>
        @endif

        <!-- Contact Buttons -->
        <div class="space-y-2 mb-4">
          @if($item->contact_method === 'facebook' || $item->contact_method === 'both')
          @if($item->user->facebook_link)
          <a href="{{ $item->user->facebook_link }}" target="_blank" rel="noopener noreferrer" class="btn-social-fb w-full">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
            Contact on Facebook
          </a>
          @endif
          @endif

          @if($item->contact_method === 'messenger' || $item->contact_method === 'both')
          @if($item->user->messenger_link)
          <a href="{{ $item->user->messenger_link }}" target="_blank" rel="noopener noreferrer" class="btn-social-messenger w-full">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.974 12-11.11C24 4.975 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8l3.131 3.259L19.752 8l-6.561 6.963z" />
            </svg>
            Message on Messenger
          </a>
          @endif
          @endif

          @if((!$item->user->facebook_link && !$item->user->messenger_link) || !$item->contact_method)
          <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
            <p class="text-gray-500 text-sm">No contact methods available</p>
          </div>
          @endif
        </div>

        <!-- Seller Stats -->
        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100">
          <div class="text-center">
            <p class="text-2xl font-bold text-gray-900">{{ $item->user->items()->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Active Listings</p>
          </div>
          <div class="text-center">
            <p class="text-2xl font-bold text-gray-900">{{ $item->user->created_at->diffForHumans(null, false, true) }}</p>
            <p class="text-xs text-gray-500 mt-1">Joined</p>
          </div>
        </div>
      </div>

      <!-- Safety Tips -->
      <div class="bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200 rounded-lg p-5 shadow-sm">
        <div class="flex items-center gap-2 mb-3">
          <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
          <h3 class="font-bold text-amber-900">Safety Tips</h3>
        </div>
        <ul class="text-sm text-amber-800 space-y-2">
          <li class="flex items-start gap-2">
            <span class="text-amber-600 font-bold">•</span>
            <span>Meet in a safe, public location</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-amber-600 font-bold">•</span>
            <span>Inspect the item before payment</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-amber-600 font-bold">•</span>
            <span>Never pay in advance</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-amber-600 font-bold">•</span>
            <span>Trust your instincts</span>
          </li>
        </ul>
      </div>

    </div>

  </div>

  <!-- Similar Items -->
  @if($similarItems->count() > 0)
  <div class="mt-12 lg:mt-16">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold text-gray-900">You might also like</h2>
      <a href="{{ route('items.index', ['category' => $item->category]) }}" class="text-trade-blue hover:text-blue-700 font-medium text-sm flex items-center gap-1">
        <span>View all in {{ $item->category }}</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
      @foreach($similarItems as $similarItem)
      <article class="item-card group">
        <a href="{{ route('items.show', $similarItem) }}" class="block">
          <div class="relative h-40 sm:h-48 bg-gray-100 overflow-hidden">
            <img
              src="{{ asset('storage/' . $similarItem->image) }}"
              alt="{{ $similarItem->item_name }}"
              class="item-card-image transition-transform duration-300 group-hover:scale-110"
              loading="lazy">
          </div>
          <div class="p-3 sm:p-4">
            <p class="text-xs text-gray-500 mb-1">{{ $similarItem->category }}</p>
            <h3 class="font-semibold text-gray-900 text-sm sm:text-base line-clamp-2 group-hover:text-trade-blue transition-colors mb-2">{{ $similarItem->item_name }}</h3>
            <p class="text-deal-orange font-bold text-lg sm:text-xl">₱{{ number_format($similarItem->price, 2) }}</p>
          </div>
        </a>
      </article>
      @endforeach
    </div>
  </div>
  @endif

  </div>
  </div>

  <!-- JavaScript for AJAX functionality -->
  <script>
    // AJAX for Favorite Toggle
    document.querySelectorAll('.favorite-form').forEach(form => {
      form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const button = this.querySelector('button');
        const count = button.querySelector('.favorite-count');
        const icon = button.querySelector('span:first-child');

        try {
          const response = await fetch(this.action, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
              'Accept': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin',
            body: JSON.stringify({}),
          });

          console.log('Favorite response status:', response.status);

          if (!response.ok) {
            const errorText = await response.text();
            console.error('Favorite error response:', errorText);
            throw new Error(`HTTP error! status: ${response.status}`);
          }

          const data = await response.json();
          console.log('Favorite data:', data);

          // Update UI
          if (data.is_favorited) {
            icon.textContent = '❤️';
            icon.classList.add('favorite-active');
            button.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            button.classList.add('bg-red-50', 'text-red-600', 'hover:bg-red-100');
          } else {
            icon.textContent = '🤍';
            icon.classList.remove('favorite-active');
            button.classList.remove('bg-red-50', 'text-red-600', 'hover:bg-red-100');
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
          }

          // Update count
          const likesText = data.favorites_count == 1 ? 'like' : 'likes';
          count.textContent = `${data.favorites_count} ${likesText}`;

        } catch (error) {
          console.error('Favorite error:', error);
          alert('Failed to update favorite. Please try again.');
        }
      });
    });

    // AJAX for Comment Submit
    const commentForm = document.getElementById('comment-form');
    if (commentForm) {
      commentForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const messageInput = document.getElementById('comment-message');
        const message = messageInput.value.trim();

        if (!message) return;

        try {
          const response = await fetch(this.action, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
              'Accept': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin',
            body: JSON.stringify({
              message
            }),
          });

          console.log('Comment response status:', response.status);

          if (!response.ok) {
            const errorText = await response.text();
            console.error('Comment error response:', errorText);
            throw new Error(`HTTP error! status: ${response.status}`);
          }

          const data = await response.json();
          console.log('Comment data:', data);

          if (data.success) {
            // Clear the form
            messageInput.value = '';

            // Remove "no comments" message if exists
            const noComments = document.getElementById('no-comments');
            if (noComments) {
              noComments.remove();
            }

            // Add new comment to the list
            const commentsList = document.getElementById('comments-list');
            const newComment = document.createElement('div');
            newComment.className = 'flex gap-3 pb-4 border-b border-gray-100 last:border-0';
            newComment.dataset.commentId = data.comment.id;
            newComment.innerHTML = `
              <img src="${data.comment.user_avatar}" alt="${data.comment.user_name}" class="w-10 h-10 rounded-full ring-2 ring-gray-100 flex-shrink-0">
              <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-2 mb-2">
                  <div>
                    <span class="font-semibold text-gray-900">${data.comment.user_name}</span>
                    <span class="text-xs text-gray-500 ml-2">just now</span>
                  </div>
                  <form action="/comments/${data.comment.id}" method="POST" class="delete-comment-form" onsubmit="return confirm('Delete this comment?');">
                    <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').content}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium transition-colors">
                      Delete
                    </button>
                  </form>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">${data.comment.message}</p>
              </div>
            `;
            commentsList.insertBefore(newComment, commentsList.firstChild);

            // Update comments count
            const commentsCount = document.getElementById('comments-count');
            commentsCount.textContent = data.comments_count;

            // Re-attach delete event listener
            attachDeleteListeners();
          }
        } catch (error) {
          console.error('Error:', error);
          alert('Failed to post comment. Please try again.');
        }
      });
    }

    // AJAX for Comment Delete
    function attachDeleteListeners() {
      document.querySelectorAll('.delete-comment-form').forEach(form => {
        form.removeEventListener('submit', handleDelete);
        form.addEventListener('submit', handleDelete);
      });
    }

    async function handleDelete(e) {
      e.preventDefault();

      if (!confirm('Delete this comment?')) return;

      const form = this;
      const commentDiv = form.closest('[data-comment-id]');

      try {
        const response = await fetch(form.action, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          credentials: 'same-origin',
        });

        const data = await response.json();

        if (data.success) {
          // Remove the comment from DOM
          commentDiv.remove();

          // Update comments count
          const commentsCount = document.getElementById('comments-count');
          const newCount = parseInt(commentsCount.textContent) - 1;
          commentsCount.textContent = newCount;

          // Show "no comments" message if no comments left
          const commentsList = document.getElementById('comments-list');
          if (commentsList.children.length === 0) {
            commentsList.innerHTML = `
              <div class="text-center py-8" id="no-comments">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <p class="text-gray-500 font-medium">No comments yet</p>
                <p class="text-gray-400 text-sm mt-1">Be the first to share your thoughts!</p>
              </div>
            `;
          }
        }
      } catch (error) {
        console.error('Error:', error);
        alert('Failed to delete comment. Please try again.');
      }
    }

    // Initialize delete listeners
    attachDeleteListeners();
  </script>
</x-sidebar-layout>