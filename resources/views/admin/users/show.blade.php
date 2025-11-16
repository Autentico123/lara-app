@extends('layouts.admin')

@section('header')
<div class="flex items-center justify-between">
  <div>
    <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-700 text-sm mb-2 inline-block">
      ← Back to Users
    </a>
    <h1 class="text-3xl font-bold text-gray-900">User Details</h1>
  </div>
  @if(!$user->isAdmin())
  <button onclick="confirmDelete()" class="inline-flex items-center px-4 py-2 border border-red-300 text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
    Delete User
  </button>
  <form id="delete-form" action="{{ route('admin.users.destroy', $user) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
  </form>
  @endif
</div>
@endsection

@section('content')

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
  <!-- User Profile Card -->
  <div class="lg:col-span-1">
    <div class="bg-white shadow rounded-lg overflow-hidden">
      <div class="px-4 py-5 sm:p-6">
        <div class="flex flex-col items-center">
          <img class="h-32 w-32 rounded-full mb-4" src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}">

          <h2 class="text-2xl font-bold text-gray-900 text-center">{{ $user->name }}</h2>
          <p class="text-sm text-gray-500 mb-4">{{ $user->email }}</p>

          @if($user->isAdmin())
          <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 mb-4">
            Admin
          </span>
          @else
          <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800 mb-4">
            User
          </span>
          @endif

          @if($user->bio)
          <p class="text-sm text-gray-600 text-center mb-4">{{ $user->bio }}</p>
          @endif

          @if($user->location)
          <div class="flex items-center text-sm text-gray-500 mb-2">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ $user->location }}
          </div>
          @endif

          <div class="flex items-center text-sm text-gray-500">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Joined {{ $user->created_at->format('M d, Y') }}
          </div>
        </div>

        <!-- Social Links -->
        @if($user->facebook_link || $user->messenger_link)
        <div class="mt-6 pt-6 border-t border-gray-200">
          <h3 class="text-sm font-medium text-gray-900 mb-3">Social Media</h3>
          <div class="space-y-2">
            @if($user->facebook_link)
            <a href="{{ $user->facebook_link }}" target="_blank" class="flex items-center text-sm text-blue-600 hover:text-blue-700">
              <svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
              Facebook
            </a>
            @endif
            @if($user->messenger_link)
            <a href="{{ $user->messenger_link }}" target="_blank" class="flex items-center text-sm text-blue-600 hover:text-blue-700">
              <svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0C5.373 0 0 4.975 0 11.111c0 3.497 1.745 6.616 4.472 8.652V24l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.974 12-11.11C24 4.975 18.627 0 12 0zm1.191 14.963l-3.055-3.26-5.963 3.26L10.732 8.1l3.131 3.26 5.887-3.26-6.559 6.863z" />
              </svg>
              Messenger
            </a>
            @endif
          </div>
        </div>
        @endif
      </div>
    </div>

    <!-- Activity Stats -->
    <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
      <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Activity Statistics</h3>
        <dl class="space-y-4">
          <div class="flex justify-between">
            <dt class="text-sm font-medium text-gray-500">Items Posted</dt>
            <dd class="text-sm font-semibold text-gray-900">{{ $user->items_count }}</dd>
          </div>
          <div class="flex justify-between">
            <dt class="text-sm font-medium text-gray-500">Comments Made</dt>
            <dd class="text-sm font-semibold text-gray-900">{{ $user->comments_count }}</dd>
          </div>
          <div class="flex justify-between">
            <dt class="text-sm font-medium text-gray-500">Favorites Given</dt>
            <dd class="text-sm font-semibold text-gray-900">{{ $user->favorites_count }}</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>

  <!-- User's Items -->
  <div class="lg:col-span-2">
    <div class="bg-white shadow rounded-lg overflow-hidden">
      <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Posted Items</h3>
        <p class="mt-1 text-sm text-gray-500">Recent items posted by this user</p>
      </div>
      <div class="px-4 py-5 sm:p-6">
        @if($user->items->count() > 0)
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          @foreach($user->items as $item)
          <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
            @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}"
              alt="{{ $item->title }}"
              class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
              <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            @endif
            <div class="p-4">
              <h4 class="text-lg font-semibold text-gray-900 mb-1">{{ $item->title }}</h4>
              <p class="text-sm text-gray-500 mb-2 line-clamp-2">{{ $item->description }}</p>
              <div class="flex items-center justify-between">
                <span class="text-lg font-bold text-blue-600">₱{{ number_format($item->price, 2) }}</span>
                <a href="{{ route('items.show', $item) }}"
                  target="_blank"
                  class="text-sm text-blue-600 hover:text-blue-700">
                  View →
                </a>
              </div>
              <div class="mt-2 flex items-center justify-between text-xs text-gray-500">
                <span class="capitalize">{{ $item->status }}</span>
                <span>{{ $item->created_at->diffForHumans() }}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        @if($user->items_count > 10)
        <div class="mt-4 text-center">
          <p class="text-sm text-gray-500">
            Showing latest 10 items. Total: {{ $user->items_count }} items
          </p>
        </div>
        @endif
        @else
        <div class="text-center py-12">
          <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
          </svg>
          <p class="mt-2 text-sm text-gray-500">No items posted yet</p>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
  function confirmDelete() {
    if (confirm('Are you sure you want to delete this user? This will also delete all their items and cannot be undone.')) {
      document.getElementById('delete-form').submit();
    }
  }
</script>
@endsection