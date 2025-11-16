@extends('layouts.admin')

@section('header')
<div class="flex items-center justify-between">
  <div>
    <h1 class="text-3xl font-bold text-gray-900">Item Details</h1>
    <p class="mt-1 text-sm text-gray-600">View and manage item information</p>
  </div>
  <a href="{{ route('admin.items.index') }}" class="btn-secondary px-4 py-2">
    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    Back to Items
  </a>
</div>
@endsection

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  <!-- Main Content (Left) -->
  <div class="lg:col-span-2 space-y-6">
    <!-- Item Details Card -->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
      <div class="p-6">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-2xl font-bold text-gray-900">{{ $item->item_name }}</h2>
          @if($item->reports->count() > 0)
          <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-bold bg-red-100 text-red-800 border border-red-200">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            {{ $item->reports->count() }} Reports
          </span>
          @endif
        </div>

        <!-- Item Image -->
        <div class="mb-6">
          <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" class="w-full h-96 object-cover rounded-xl shadow-lg">
        </div>

        <!-- Item Info Grid -->
        <div class="grid grid-cols-2 gap-4 mb-6">
          <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="text-sm font-medium text-blue-600 mb-1">Price</div>
            <div class="text-2xl font-bold text-blue-900">₱{{ number_format($item->price, 2) }}</div>
          </div>
          <div class="bg-teal-50 rounded-lg p-4 border border-teal-100">
            <div class="text-sm font-medium text-teal-600 mb-1">Category</div>
            <div class="text-lg font-bold text-teal-900 capitalize">{{ $item->category }}</div>
          </div>
          <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
            <div class="text-sm font-medium text-purple-600 mb-1">Views</div>
            <div class="text-2xl font-bold text-purple-900">{{ number_format($item->views) }}</div>
          </div>
          <div class="bg-pink-50 rounded-lg p-4 border border-pink-100">
            <div class="text-sm font-medium text-pink-600 mb-1">Favorites</div>
            <div class="text-2xl font-bold text-pink-900">{{ $item->favorites->count() }}</div>
          </div>
        </div>

        <!-- Description -->
        <div class="border-t border-gray-200 pt-6">
          <h3 class="text-lg font-bold text-gray-900 mb-3">Description</h3>
          <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $item->description }}</p>
        </div>

        <!-- Timestamps -->
        <div class="border-t border-gray-200 pt-6 mt-6">
          <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
              <span class="text-gray-500">Posted:</span>
              <span class="font-semibold text-gray-900">{{ $item->created_at->format('M d, Y h:i A') }}</span>
              <span class="text-gray-400">({{ $item->created_at->diffForHumans() }})</span>
            </div>
            <div>
              <span class="text-gray-500">Last Updated:</span>
              <span class="font-semibold text-gray-900">{{ $item->updated_at->format('M d, Y h:i A') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Reports Section -->
    @if($item->reports->count() > 0)
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-red-200">
      <div class="px-6 py-4 bg-red-50 border-b border-red-200 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
          <h3 class="text-lg font-bold text-red-900">Reports ({{ $item->reports->count() }})</h3>
        </div>
        <form method="POST" action="{{ route('admin.items.dismiss-reports', $item) }}" onsubmit="return confirm('Are you sure you want to dismiss all reports for this item?');">
          @csrf
          <button type="submit" class="px-4 py-2 bg-white border border-red-300 text-red-700 rounded-lg hover:bg-red-50 transition-colors font-medium text-sm">
            Dismiss All Reports
          </button>
        </form>
      </div>
      <div class="divide-y divide-gray-200">
        @foreach($item->reports as $report)
        <div class="p-6 hover:bg-gray-50 transition-colors">
          <div class="flex items-start gap-4">
            <img class="h-10 w-10 rounded-full border-2 border-gray-200" src="{{ $report->user->avatarUrl() }}" alt="{{ $report->user->name }}">
            <div class="flex-1">
              <div class="flex items-center justify-between mb-2">
                <div>
                  <span class="font-semibold text-gray-900">{{ $report->user->name }}</span>
                  <span class="text-sm text-gray-500">{{ $report->user->email }}</span>
                </div>
                <span class="text-xs text-gray-500">{{ $report->created_at->diffForHumans() }}</span>
              </div>
              <div class="bg-red-50 rounded-lg p-3 border border-red-100">
                <div class="text-sm font-medium text-red-600 mb-1">Reason:</div>
                <p class="text-gray-700">{{ $report->reason }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif

    <!-- Comments Section -->
    @if($item->comments->count() > 0)
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
      <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <h3 class="text-lg font-bold text-gray-900">Comments ({{ $item->comments->count() }})</h3>
      </div>
      <div class="divide-y divide-gray-200 max-h-96 overflow-y-auto">
        @foreach($item->comments as $comment)
        <div class="p-6 hover:bg-gray-50 transition-colors">
          <div class="flex items-start gap-4">
            <img class="h-10 w-10 rounded-full" src="{{ $comment->user->avatarUrl() }}" alt="{{ $comment->user->name }}">
            <div class="flex-1">
              <div class="flex items-center justify-between mb-2">
                <span class="font-semibold text-gray-900">{{ $comment->user->name }}</span>
                <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
              </div>
              <p class="text-gray-700">{{ $comment->comment }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>

  <!-- Sidebar (Right) -->
  <div class="space-y-6">
    <!-- Seller Information -->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
      <div class="px-6 py-4 bg-gradient-to-r from-trade-blue to-blue-600 border-b border-blue-700">
        <h3 class="text-lg font-bold text-white">Seller Information</h3>
      </div>
      <div class="p-6">
        <div class="flex items-center gap-4 mb-4">
          <img class="h-16 w-16 rounded-full border-2 border-trade-blue shadow-lg" src="{{ $item->user->avatarUrl() }}" alt="{{ $item->user->name }}">
          <div>
            <div class="font-bold text-gray-900 text-lg">{{ $item->user->name }}</div>
            <div class="text-sm text-gray-500">{{ $item->user->email }}</div>
            @if($item->user->isAdmin())
            <span class="inline-block px-2 py-1 text-xs font-bold bg-purple-100 text-purple-800 rounded mt-1">
              Admin
            </span>
            @endif
          </div>
        </div>

        <div class="space-y-3 text-sm">
          <div class="flex justify-between">
            <span class="text-gray-600">Total Items:</span>
            <span class="font-semibold text-gray-900">{{ $item->user->items->count() }}</span>
          </div>
          <div class="flex justify-between">
            <span class="text-gray-600">Member Since:</span>
            <span class="font-semibold text-gray-900">{{ $item->user->created_at->format('M Y') }}</span>
          </div>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
          <a href="{{ route('admin.users.show', $item->user) }}" class="block w-full text-center px-4 py-2 bg-trade-blue text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
            View Seller Profile
          </a>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
      <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
      </div>
      <div class="p-6 space-y-3">
        <a href="{{ route('items.show', $item) }}" target="_blank" class="block w-full text-center px-4 py-2.5 bg-trade-teal text-white rounded-lg hover:bg-teal-700 transition-colors font-medium">
          <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
          </svg>
          View on Site
        </a>

        @if($item->reports->count() > 0)
        <form method="POST" action="{{ route('admin.items.dismiss-reports', $item) }}" onsubmit="return confirm('Dismiss all reports for this item?');">
          @csrf
          <button type="submit" class="block w-full text-center px-4 py-2.5 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors font-medium">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Dismiss Reports
          </button>
        </form>
        @endif

        <form method="POST" action="{{ route('admin.items.destroy', $item) }}" onsubmit="return confirm('Are you sure you want to delete this item? This action cannot be undone.');">
          @csrf
          @method('DELETE')
          <button type="submit" class="block w-full text-center px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Delete Item
          </button>
        </form>
      </div>
    </div>

    <!-- Favorites List -->
    @if($item->favorites->count() > 0)
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
      <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <h3 class="text-lg font-bold text-gray-900">Favorited By ({{ $item->favorites->count() }})</h3>
      </div>
      <div class="p-6">
        <div class="space-y-3 max-h-64 overflow-y-auto">
          @foreach($item->favorites->take(10) as $favorite)
          <div class="flex items-center gap-3">
            <img class="h-8 w-8 rounded-full" src="{{ $favorite->user->avatarUrl() }}" alt="{{ $favorite->user->name }}">
            <div class="flex-1 min-w-0">
              <div class="text-sm font-medium text-gray-900 truncate">{{ $favorite->user->name }}</div>
              <div class="text-xs text-gray-500">{{ $favorite->created_at->diffForHumans() }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endif
  </div>
</div>

@endsection