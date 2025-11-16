@extends('layouts.admin')

@section('header')
<div class="flex items-center justify-between">
  <h1 class="text-3xl font-bold text-gray-900">User Management</h1>
  <div class="text-sm text-gray-500">
    Total: {{ $users->total() }} users
  </div>
</div>
@endsection

@section('content')

<!-- Filters & Search -->
<div class="bg-white shadow rounded-lg mb-6">
  <div class="px-4 py-5 sm:p-6">
    <form method="GET" action="{{ route('admin.users.index') }}" class="space-y-4">
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
        <!-- Search -->
        <div class="sm:col-span-2">
          <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
          <input type="text"
            name="search"
            id="search"
            value="{{ request('search') }}"
            placeholder="Search by name or email..."
            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
        </div>

        <!-- Role Filter -->
        <div>
          <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
          <select name="role"
            id="role"
            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
            <option value="">All Roles</option>
            <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
          </select>
        </div>

        <!-- Sort By -->
        <div>
          <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
          <select name="sort"
            id="sort"
            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
            <option value="created_at" {{ request('sort', 'created_at') === 'created_at' ? 'selected' : '' }}>Join Date</option>
            <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name</option>
            <option value="email" {{ request('sort') === 'email' ? 'selected' : '' }}>Email</option>
          </select>
        </div>
      </div>

      <div class="flex items-center justify-between">
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          Apply Filters
        </button>

        @if(request()->hasAny(['search', 'role', 'sort', 'order']))
        <a href="{{ route('admin.users.index') }}"
          class="text-sm text-gray-600 hover:text-gray-900">
          Clear Filters
        </a>
        @endif
      </div>
    </form>
  </div>
</div>

<!-- Users Table -->
<div class="bg-white shadow rounded-lg overflow-hidden">
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            User
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Role
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Items
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Activity
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Joined
          </th>
          <th scope="col" class="relative px-6 py-3">
            <span class="sr-only">Actions</span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse($users as $user)
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full" src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                  {{ $user->name }}
                </div>
                <div class="text-sm text-gray-500">
                  {{ $user->email }}
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            @if($user->isAdmin())
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
              Admin
            </span>
            @else
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              User
            </span>
            @endif
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            {{ $user->items_count }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">
              <div>{{ $user->comments_count }} comments</div>
              <div class="text-gray-500">{{ $user->favorites_count }} favorites</div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $user->created_at->format('M d, Y') }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="{{ route('admin.users.show', $user) }}"
              class="text-blue-600 hover:text-blue-900 mr-3">
              View
            </a>
            @if(!$user->isAdmin())
            <button type="button"
              class="text-red-600 hover:text-red-900 delete-user-btn"
              data-user-id="{{ $user->id }}"
              data-user-name="{{ $user->name }}">
              Delete
            </button>
            <form id="delete-form-{{ $user->id }}"
              action="{{ route('admin.users.destroy', $user) }}"
              method="POST"
              class="hidden">
              @csrf
              @method('DELETE')
            </form>
            @endif
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="px-6 py-12 text-center text-gray-500">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <p class="mt-2">No users found</p>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  @if($users->hasPages())
  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
    {{ $users->links() }}
  </div>
  @endif
</div>

<!-- Delete Confirmation Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-user-btn').forEach(button => {
      button.addEventListener('click', function() {
        const userId = this.getAttribute('data-user-id');
        const userName = this.getAttribute('data-user-name');

        if (confirm(`Are you sure you want to delete user "${userName}"? This will also delete all their items and cannot be undone.`)) {
          document.getElementById('delete-form-' + userId).submit();
        }
      });
    });
  });
</script>
@endsection