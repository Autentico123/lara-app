@extends('layouts.admin')

@section('header')
<div class="flex items-center justify-between">
  <div>
    <h1 class="text-3xl font-bold text-gray-900">Item Management</h1>
    <p class="mt-1 text-sm text-gray-600">Manage all items posted on TradeLink</p>
  </div>
</div>
@endsection

@section('content')

<!-- Statistics Cards -->
<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-6">
  <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-xl bg-gradient-to-br from-trade-blue to-blue-600 p-3 shadow-lg shadow-blue-500/30">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Total Items</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ number_format($stats['total']) }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-xl bg-gradient-to-br from-red-500 to-pink-600 p-3 shadow-lg shadow-red-500/30">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Flagged Items</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ number_format($stats['flagged']) }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-xl bg-gradient-to-br from-trade-teal to-green-600 p-3 shadow-lg shadow-teal-500/30">
            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Total Views</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ number_format($stats['total_views']) }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100">
    <div class="p-5">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <div class="rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 p-3 shadow-lg shadow-purple-500/30">
            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
          </div>
        </div>
        <div class="ml-5 w-0 flex-1">
          <dl>
            <dt class="text-sm font-medium text-gray-500 truncate">Total Favorites</dt>
            <dd class="flex items-baseline">
              <div class="text-2xl font-semibold text-gray-900">{{ number_format($stats['total_favorites']) }}</div>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Filters -->
<div class="bg-white shadow-lg rounded-xl p-6 mb-6 border border-gray-100">
  <form method="GET" action="{{ route('admin.items.index') }}" class="space-y-4">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
      <!-- Search -->
      <div class="lg:col-span-2">
        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Item name, description, or seller..." class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-trade-blue focus:ring-trade-blue">
      </div>

      <!-- Category Filter -->
      <div>
        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
        <select name="category" id="category" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-trade-blue focus:ring-trade-blue">
          <option value="">All Categories</option>
          @foreach($categories as $cat)
          <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
            {{ ucfirst($cat) }}
          </option>
          @endforeach
        </select>
      </div>

      <!-- Status Filter -->
      <div>
        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
        <select name="status" id="status" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-trade-blue focus:ring-trade-blue">
          <option value="">All Items</option>
          <option value="flagged" {{ request('status') == 'flagged' ? 'selected' : '' }}>Flagged Only</option>
        </select>
      </div>

      <!-- Sort -->
      <div>
        <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
        <select name="sort" id="sort" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-trade-blue focus:ring-trade-blue">
          <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
          <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
          <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
          <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
          <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>Most Viewed</option>
          <option value="most_favorited" {{ request('sort') == 'most_favorited' ? 'selected' : '' }}>Most Favorited</option>
          <option value="most_reported" {{ request('sort') == 'most_reported' ? 'selected' : '' }}>Most Reported</option>
        </select>
      </div>
    </div>

    <div class="flex items-center gap-3">
      <button type="submit" class="btn-primary px-5 py-2.5">
        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        Apply Filters
      </button>
      <a href="{{ route('admin.items.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">
        Clear Filters
      </a>
    </div>
  </form>
</div>

<!-- Bulk Actions Form -->
<form id="bulk-action-form" method="POST" action="{{ route('admin.items.bulk-destroy') }}">
  @csrf
  @method('DELETE')

  <!-- Items Table -->
  <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
      <div class="flex items-center gap-4">
        <input type="checkbox" id="select-all" class="rounded border-gray-300 text-trade-blue focus:ring-trade-blue">
        <label for="select-all" class="text-sm font-medium text-gray-700">Select All</label>
      </div>
      <button type="button" id="bulk-delete-btn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium disabled:opacity-50 disabled:cursor-not-allowed" disabled>
        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        Delete Selected
      </button>
    </div>

    @if($items->count() > 0)
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Select
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Item
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Seller
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Price
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Stats
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Status
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Date
            </th>
            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
              Actions
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($items as $item)
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4 whitespace-nowrap">
              <input type="checkbox" name="item_ids[]" value="{{ $item->id }}" class="item-checkbox rounded border-gray-300 text-trade-blue focus:ring-trade-blue">
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-16 w-16">
                  <img class="h-16 w-16 rounded-lg object-cover border border-gray-200" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900 line-clamp-1">{{ $item->item_name }}</div>
                  <div class="text-sm text-gray-500 capitalize">{{ $item->category }}</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <img class="h-8 w-8 rounded-full" src="{{ $item->user->avatarUrl() }}" alt="{{ $item->user->name }}">
                <div class="ml-3">
                  <div class="text-sm font-medium text-gray-900">{{ $item->user->name }}</div>
                  <div class="text-sm text-gray-500">{{ $item->user->email }}</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm font-bold text-gray-900">₱{{ number_format($item->price, 2) }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-xs space-y-1">
                <div class="flex items-center gap-1 text-gray-600">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  {{ $item->views }} views
                </div>
                <div class="flex items-center gap-1 text-red-500">
                  <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                  </svg>
                  {{ $item->favorites_count }} favorites
                </div>
                <div class="flex items-center gap-1 text-gray-600">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                  </svg>
                  {{ $item->comments_count }} comments
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              @if($item->reports_count > 0)
              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-200">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ $item->reports_count }} Reports
              </span>
              @else
              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                Active
              </span>
              @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              <div>{{ $item->created_at->format('M d, Y') }}</div>
              <div class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <div class="flex items-center justify-end gap-2">
                <a href="{{ route('admin.items.show', $item) }}" class="text-trade-blue hover:text-blue-700 font-medium">
                  View
                </a>
                <form method="POST" action="{{ route('admin.items.destroy', $item) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                    Delete
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200">
      {{ $items->links() }}
    </div>
    @else
    <div class="text-center py-12">
      <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
      </svg>
      <h3 class="mt-2 text-sm font-medium text-gray-900">No items found</h3>
      <p class="mt-1 text-sm text-gray-500">Try adjusting your filters</p>
    </div>
    @endif
  </div>
</form>

<script>
  // Select All functionality
  const selectAllCheckbox = document.getElementById('select-all');
  const itemCheckboxes = document.querySelectorAll('.item-checkbox');
  const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
  const bulkActionForm = document.getElementById('bulk-action-form');

  selectAllCheckbox?.addEventListener('change', function() {
    itemCheckboxes.forEach(checkbox => {
      checkbox.checked = this.checked;
    });
    updateBulkDeleteButton();
  });

  itemCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkDeleteButton);
  });

  function updateBulkDeleteButton() {
    const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
    bulkDeleteBtn.disabled = checkedCount === 0;
    bulkDeleteBtn.textContent = checkedCount > 0 ? `Delete Selected (${checkedCount})` : 'Delete Selected';
  }

  bulkDeleteBtn?.addEventListener('click', function() {
    const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
    if (checkedCount > 0 && confirm(`Are you sure you want to delete ${checkedCount} items? This action cannot be undone.`)) {
      bulkActionForm.submit();
    }
  });
</script>

@endsection