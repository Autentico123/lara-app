<x-sidebar-layout>
  <x-slot name="title">Edit Item - TradeLink</x-slot>

  <x-slot name="header">
    <div class="flex items-center gap-4">
      <div class="p-3 bg-gradient-to-br from-deal-orange to-amber-600 rounded-2xl shadow-lg shadow-orange-500/30">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
      </div>
      <div>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Edit Item ✏️</h1>
        <p class="text-gray-600 mt-1">Update your item listing details</p>
      </div>
    </div>
  </x-slot>

  <div class="px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-3xl mx-auto">

      <div class="card p-6 sm:p-8 bg-gradient-to-br from-white via-white to-orange-50/30 shadow-lg">

        <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Item Name -->
          <div class="mb-6">
            <label for="item_name" class="block text-sm font-medium text-gray-700 mb-2">Item Name *</label>
            <input type="text" name="item_name" id="item_name" value="{{ old('item_name', $item->item_name) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('item_name') border-red-500 @enderror" placeholder="e.g., iPhone 13 Pro Max">
            @error('item_name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Category -->
          <div class="mb-6">
            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
            <select name="category" id="category" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror">
              <option value="">Select a category</option>
              <option value="Electronics" {{ old('category', $item->category) == 'Electronics' ? 'selected' : '' }}>📱 Electronics</option>
              <option value="Fashion" {{ old('category', $item->category) == 'Fashion' ? 'selected' : '' }}>👕 Fashion</option>
              <option value="Home & Garden" {{ old('category', $item->category) == 'Home & Garden' ? 'selected' : '' }}>🏠 Home & Garden</option>
              <option value="Sports & Outdoors" {{ old('category', $item->category) == 'Sports & Outdoors' ? 'selected' : '' }}>⚽ Sports & Outdoors</option>
              <option value="Toys & Games" {{ old('category', $item->category) == 'Toys & Games' ? 'selected' : '' }}>🎮 Toys & Games</option>
              <option value="Books & Media" {{ old('category', $item->category) == 'Books & Media' ? 'selected' : '' }}>📚 Books & Media</option>
              <option value="Automotive" {{ old('category', $item->category) == 'Automotive' ? 'selected' : '' }}>🚗 Automotive</option>
              <option value="Health & Beauty" {{ old('category', $item->category) == 'Health & Beauty' ? 'selected' : '' }}>💄 Health & Beauty</option>
              <option value="Pets" {{ old('category', $item->category) == 'Pets' ? 'selected' : '' }}>🐾 Pets</option>
              <option value="Other" {{ old('category', $item->category) == 'Other' ? 'selected' : '' }}>📦 Other</option>
            </select>
            @error('category')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Price -->
          <div class="mb-6">
            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
            <div class="relative">
              <span class="absolute left-3 top-2 text-gray-600 font-semibold">$</span>
              <input type="number" name="price" id="price" value="{{ old('price', $item->price) }}" step="0.01" min="0" required class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror" placeholder="0.00">
            </div>
            @error('price')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Description -->
          <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
            <textarea name="description" id="description" rows="6" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror" placeholder="Describe your item in detail...">{{ old('description', $item->description) }}</textarea>
            <p class="text-gray-600 text-xs mt-1">Be specific! Include condition, features, and any flaws.</p>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Current Image -->
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
            <div class="w-full h-64 bg-gray-100 rounded-md overflow-hidden">
              <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" class="w-full h-full object-cover">
            </div>
          </div>

          <!-- New Image Upload -->
          <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload New Image (Optional)</label>
            <div class="relative">
              <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('image') border-red-500 @enderror" onchange="previewNewImage(event)">
            </div>
            <p class="text-gray-600 text-xs mt-1">Leave empty to keep current image. Max 5MB. Supported: JPG, PNG, GIF</p>
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <!-- New Image Preview -->
            <div id="newImagePreview" class="hidden mt-3">
              <p class="text-sm font-medium text-gray-700 mb-2">New Image Preview:</p>
              <img id="preview" class="w-full h-64 object-cover rounded-md border border-gray-300">
            </div>
          </div>

          <!-- Location -->
          <div class="mb-6">
            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location', $item->location) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('location') border-red-500 @enderror" placeholder="e.g., Manila, Philippines">
            @error('location')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Buttons -->
          <div class="flex items-center gap-4 pt-4 border-t border-gray-200">
            <a href="{{ route('items.show', $item) }}" class="flex-1 btn-secondary text-center">
              <span class="inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Cancel
              </span>
            </a>
            <button type="submit" class="flex-1 btn-primary shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 hover:scale-105 transition-all">
              <span class="inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Save Changes
              </span>
            </button>
          </div>

        </form>

      </div>

    </div>
  </div>

  <script>
    function previewNewImage(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('preview').src = e.target.result;
          document.getElementById('newImagePreview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
      }
    }
  </script>
</x-sidebar-layout>