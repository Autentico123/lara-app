@extends('layouts.admin')

@section('header')
<h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
@endsection

@section('content')

<!-- Statistics Cards -->
<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
  <!-- Total Users -->
  <div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-md bg-blue-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ $totalUsers }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
    <div class="bg-gray-50 px-5 py-3">
      <div class="text-sm">
        <a href="{{ route('admin.users.index') }}" class="font-medium text-blue-600 hover:text-blue-500">
          View all users
        </a>
      </div>
    </div>
  </div>

  <!-- Active Items -->
  <div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-md bg-green-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Active Items</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ $activeItems }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
    <div class="bg-gray-50 px-5 py-3">
      <div class="text-sm">
        <a href="{{ route('admin.items.index') }}" class="font-medium text-green-600 hover:text-green-500">
          View all items
        </a>
      </div>
    </div>
  </div>

  <!-- Pending Reports -->
  <div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-md bg-yellow-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Pending Reports</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ $pendingReports }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
    <div class="bg-gray-50 px-5 py-3">
      <div class="text-sm">
        <a href="#" class="font-medium text-gray-400 cursor-not-allowed">
          View reports (Coming soon)
        </a>
      </div>
    </div>
  </div>

  <!-- Today's Signups -->
  <div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-md bg-purple-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Today's Signups</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ $todaySignups }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
    <div class="bg-gray-50 px-5 py-3">
      <div class="text-sm">
        <span class="font-medium text-gray-500">New users today</span>
      </div>
    </div>
  </div>
</div>

<!-- Two Column Layout -->
<div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
  <!-- Recent Users -->
  <div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Users</h3>
      <p class="mt-1 text-sm text-gray-500">Latest registered users</p>
    </div>
    <div class="px-4 py-5 sm:p-6">
      <div class="flow-root">
        <ul role="list" class="-my-5 divide-y divide-gray-200">
          @forelse($recentUsers as $user)
          <li class="py-4">
            <div class="flex items-center space-x-4">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}">
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                  {{ $user->name }}
                </p>
                <p class="text-sm text-gray-500 truncate">
                  {{ $user->email }}
                </p>
              </div>
              <div class="text-right">
                <p class="text-sm text-gray-900">{{ $user->items_count }} items</p>
                <p class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
              </div>
            </div>
          </li>
          @empty
          <li class="py-4 text-center text-gray-500">
            No users yet
          </li>
          @endforelse
        </ul>
      </div>
    </div>
    <div class="bg-gray-50 px-4 py-4 sm:px-6">
      <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
        View all users →
      </a>
    </div>
  </div>

  <!-- Items by Category -->
  <div class="bg-white shadow rounded-lg">
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Items by Category</h3>
      <p class="mt-1 text-sm text-gray-500">Distribution of items across categories</p>
    </div>
    <div class="px-4 py-5 sm:p-6">
      @if($itemsByCategory->count() > 0)
      <dl class="space-y-4">
        @foreach($itemsByCategory as $category)
        @php
        $percentage = $activeItems > 0 ? round(($category->count / $activeItems) * 100, 1) : 0;
        @endphp
        <div class="flex items-center justify-between">
          <dt class="text-sm font-medium text-gray-900 capitalize">
            {{ $category->category }}
          </dt>
          <dd class="flex items-center">
            <span class="text-sm text-gray-900 font-semibold">{{ $category->count }}</span>
            <div class="ml-3 w-24 bg-gray-200 rounded-full h-2">
              <div class="bg-blue-600 h-2 rounded-full category-progress-bar" data-percentage="{{ $percentage }}"></div>
            </div>
          </dd>
        </div>
        @endforeach
      </dl>
      @else
      <p class="text-center text-gray-500">No items posted yet</p>
      @endif
    </div>
  </div>
</div>

<!-- Quick Actions -->
<div class="mt-8">
  <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quick Actions</h3>
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <a href="{{ route('admin.users.index') }}" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm hover:border-blue-400 hover:shadow-md transition">
      <div class="flex items-center space-x-3">
        <div class="flex-shrink-0">
          <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <span class="text-sm font-medium text-gray-900">Manage Users</span>
        </div>
      </div>
    </a>

    <a href="{{ route('admin.items.index') }}" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm hover:border-green-400 hover:shadow-md transition">
      <div class="flex items-center space-x-3">
        <div class="flex-shrink-0">
          <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <span class="text-sm font-medium text-gray-900">Manage Items</span>
        </div>
      </div>
    </a>

    <div class="relative rounded-lg border border-gray-300 bg-gray-50 px-6 py-5 opacity-50 cursor-not-allowed">
      <div class="flex items-center space-x-3">
        <div class="flex-shrink-0">
          <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <span class="text-sm font-medium text-gray-500">View Reports</span>
          <span class="block text-xs text-gray-400">Coming soon</span>
        </div>
      </div>
    </div>

    <div class="relative rounded-lg border border-gray-300 bg-gray-50 px-6 py-5 opacity-50 cursor-not-allowed">
      <div class="flex items-center space-x-3">
        <div class="flex-shrink-0">
          <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <span class="text-sm font-medium text-gray-500">View Analytics</span>
          <span class="block text-xs text-gray-400">Coming soon</span>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Set progress bar widths
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.category-progress-bar').forEach(bar => {
      const percentage = bar.getAttribute('data-percentage');
      bar.style.width = percentage + '%';
    });
  });
</script>
@endsection