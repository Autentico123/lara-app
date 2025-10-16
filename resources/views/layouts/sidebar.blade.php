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

<body class="font-sans antialiased bg-gray-50">
  <div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="hidden lg:flex lg:flex-col lg:w-64 bg-white border-r border-gray-200">
      <!-- Logo -->
      <div class="h-16 flex items-center px-6 border-b border-gray-200">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
          <div class="w-8 h-8 bg-gradient-to-br from-trade-blue to-trade-teal rounded-lg flex items-center justify-center">
            <span class="text-white font-bold text-lg">T</span>
          </div>
          <span class="font-bold text-xl text-gray-900">TradeLink</span>
        </a>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 px-4 py-6 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dashboard') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span>Dashboard</span>
        </a>

        <a href="{{ route('items.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.index') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <span>Browse Items</span>
        </a>

        <a href="{{ route('favorites.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('favorites.*') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
          <span>My Favorites</span>
        </a>

        <div class="pt-4 pb-2">
          <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">My Items</p>
        </div>

        <a href="{{ route('items.create') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.create') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span>Post New Item</span>
        </a>

        <div class="pt-4 pb-2">
          <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Account</p>
        </div>

        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('profile.*') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span>Profile Settings</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors text-left">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Logout</span>
          </button>
        </form>
      </nav>

      <!-- User Profile Card -->
      <div class="p-4 border-t border-gray-200">
        <div class="flex items-center gap-3">
          <img src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->name }}" class="w-10 h-10 rounded-full ring-2 ring-gray-100">
          <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

      <!-- Top Navigation (Mobile) -->
      <header class="lg:hidden h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4">
        <button id="mobile-menu-button" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 bg-gradient-to-br from-trade-blue to-trade-teal rounded-lg flex items-center justify-center">
            <span class="text-white font-bold">T</span>
          </div>
          <span class="font-bold text-lg text-gray-900">TradeLink</span>
        </div>
        <div class="w-10"></div>
      </header>

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

  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-xl">
      <div class="h-16 flex items-center justify-between px-4 border-b border-gray-200">
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 bg-gradient-to-br from-trade-blue to-trade-teal rounded-lg flex items-center justify-center">
            <span class="text-white font-bold">T</span>
          </div>
          <span class="font-bold text-lg text-gray-900">TradeLink</span>
        </div>
        <button id="mobile-menu-close" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <nav class="p-4 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dashboard') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span>Dashboard</span>
        </a>
        <a href="{{ route('items.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.index') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <span>Browse Items</span>
        </a>
        <a href="{{ route('favorites.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('favorites.*') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
          <span>My Favorites</span>
        </a>
        <a href="{{ route('items.create') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('items.create') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span>Post New Item</span>
        </a>
        <div class="pt-4 pb-2">
          <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Account</p>
        </div>
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('profile.*') ? 'text-trade-blue bg-blue-50' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg font-medium">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span>Profile Settings</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg font-medium text-left">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Logout</span>
          </button>
        </form>
      </nav>

      <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">
        <div class="flex items-center gap-3">
          <img src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->name }}" class="w-10 h-10 rounded-full ring-2 ring-gray-100">
          <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
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