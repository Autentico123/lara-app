<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'TradeLink') }} - Admin Panel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-br from-gray-50 via-blue-50/30 to-teal-50/30">
  <div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="hidden lg:flex lg:flex-shrink-0 fixed inset-y-0 left-0 z-50">
      <div class="flex flex-col w-64">
        <div class="flex flex-col flex-grow bg-gradient-to-b from-gray-900 via-gray-900 to-gray-800 pt-5 pb-4 overflow-y-auto shadow-2xl h-screen">
          <!-- Logo -->
          <div class="flex items-center flex-shrink-0 px-4 mb-5 border-b border-gray-700/50 pb-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
              <div class="w-10 h-10 bg-gradient-to-br from-deal-orange to-amber-500 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/50 group-hover:shadow-orange-500/70 transition-all duration-300 group-hover:scale-110">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
              </div>
              <div>
                <span class="font-bold text-xl text-white group-hover:text-deal-orange transition-colors">Admin Panel</span>
                <p class="text-xs text-gray-400">TradeLink</p>
              </div>
            </a>
          </div>

          <!-- Admin Info Badge -->
          <div class="px-4 mb-4">
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl p-3 shadow-lg shadow-purple-500/30">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <img class="h-10 w-10 rounded-full border-2 border-white shadow-md" src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->name }}">
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                  <p class="text-xs text-purple-100">Administrator</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Navigation -->
          <nav class="mt-5 flex-1 flex flex-col px-2 space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
              class="group flex items-center px-2 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all duration-200">
              <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              Dashboard
            </a>

            <!-- Divider -->
            <div class="pt-4 pb-2">
              <p class="px-2 text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                <span class="w-4 h-0.5 bg-gray-700 rounded-full"></span>
                Management
              </p>
            </div>

            <!-- Users -->
            <a href="{{ route('admin.users.index') }}"
              class="group flex items-center px-2 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all duration-200">
              <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              Users
            </a>

            <!-- Items (Coming Soon) -->
            <a href="{{ route('admin.items.index') }}"
              class="group flex items-center px-2 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('admin.items.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all duration-200">
              <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
              </svg>
              Items
            </a>
          </nav>

          <!-- Back to Site & Logout -->
          <div class="flex-shrink-0 border-t border-gray-700/50 p-4 bg-gray-800/50">
            <div class="flex flex-col w-full space-y-2">
              <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Site
              </a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center px-2 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-red-500/20 hover:text-red-400 w-full text-left transition-all duration-200">
                  <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                  Logout
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-hidden">
      <!-- Top Navigation (Mobile) -->
      <div class="lg:hidden fixed top-0 left-0 right-0 z-40">
        <div class="flex items-center justify-between bg-gradient-to-r from-gray-900 to-gray-800 px-4 py-3 shadow-lg">
          <div class="flex items-center">
            <button type="button" class="text-white hover:text-deal-orange transition-colors" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
            <h1 class="ml-3 text-xl font-bold text-white">Admin Panel</h1>
          </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden bg-gradient-to-b from-gray-900 to-gray-800 px-2 pt-2 pb-3 space-y-1 shadow-xl mt-16">
          <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-xl text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all duration-200">
            Dashboard
          </a>
          <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 rounded-xl text-base font-medium {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all duration-200">
            Users
          </a>
          <a href="{{ route('admin.items.index') }}" class="block px-3 py-2 rounded-xl text-base font-medium {{ request()->routeIs('admin.items.*') ? 'bg-gradient-to-r from-trade-blue to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all duration-200">
            Items
          </a>
          <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-xl text-base font-medium text-gray-300 hover:bg-gray-800/50 hover:text-white transition-all duration-200">
            Back to Site
          </a>
        </div>
      </div>

      <!-- Page Header -->
      @hasSection('header')
      <header class="bg-white shadow fixed top-0 right-0 z-30 left-0 lg:left-64">
        <div class="py-6 px-4 sm:px-6 lg:px-8">
          @yield('header')
        </div>
      </header>
      @endif

      <!-- Main content area -->
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 pt-28 lg:ml-64">
        <div class="px-4 sm:px-6 lg:px-8 py-8">
          <!-- Flash Messages -->
          @if (session('success'))
          <div class="mb-4 bg-green-50 border-l-4 border-green-400 p-4">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm text-green-700">{{ session('success') }}</p>
              </div>
            </div>
          </div>
          @endif

          @if (session('error'))
          <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm text-red-700">{{ session('error') }}</p>
              </div>
            </div>
          </div>
          @endif

          @yield('content')
        </div>
      </main>
    </div>
  </div>
</body>

</html>