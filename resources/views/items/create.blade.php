<x-sidebar-layout>
  <x-slot name="title">Post New Item - TradeLink</x-slot>

  <x-slot name="header">
    <div class="flex items-center gap-4">
      <div class="p-3 bg-gradient-to-br from-trade-blue to-blue-600 rounded-2xl shadow-lg shadow-blue-500/30">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
      </div>
      <div>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Post a New Item 📦</h1>
        <p class="text-gray-600 mt-1">Fill in the details to list your item for sale</p>
      </div>
    </div>
  </x-slot>

  <div class="px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-3xl mx-auto">
      <div class="card p-6 sm:p-8 bg-gradient-to-br from-white via-white to-blue-50/30 shadow-lg">
        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data" class="space-y-6">
          @csrf

          <!-- Item Name -->
          <div>
            <x-input-label for="item_name" :value="__('Item Name')" />
            <x-text-input id="item_name" class="block mt-1 w-full" type="text" name="item_name" :value="old('item_name')" required autofocus placeholder="e.g., iPhone 13 Pro Max 256GB" />
            <x-input-error :messages="$errors->get('item_name')" class="mt-2" />
          </div>

          <!-- Category -->
          <div>
            <x-input-label for="category" :value="__('Category')" />
            <select id="category" name="category" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
              <option value="">Select a category</option>
              @foreach($categories as $value => $label)
              <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>
                {{ $label }}
              </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
          </div>

          <!-- Price -->
          <div>
            <x-input-label for="price" :value="__('Price (₱)')" />
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">₱</span>
              </div>
              <x-text-input id="price" class="pl-7 block w-full" type="number" step="0.01" name="price" :value="old('price')" required placeholder="0.00" />
            </div>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
          </div>

          <!-- Negotiable -->
          <div class="flex items-center">
            <input id="negotiable" name="negotiable" type="checkbox" value="1" {{ old('negotiable', true) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="negotiable" class="ml-2 block text-sm text-gray-700">
              Price is negotiable
            </label>
          </div>

          <!-- Condition -->
          <div>
            <x-input-label for="condition" :value="__('Condition')" />
            <select id="condition" name="condition" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
              <option value="">Select condition (optional)</option>
              <option value="Brand New" {{ old('condition') == 'Brand New' ? 'selected' : '' }}>Brand New</option>
              <option value="Like New" {{ old('condition') == 'Like New' ? 'selected' : '' }}>Like New</option>
              <option value="Excellent" {{ old('condition') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
              <option value="Good" {{ old('condition') == 'Good' ? 'selected' : '' }}>Good</option>
              <option value="Fair" {{ old('condition') == 'Fair' ? 'selected' : '' }}>Fair</option>
              <option value="For Parts" {{ old('condition') == 'For Parts' ? 'selected' : '' }}>For Parts</option>
            </select>
            <x-input-error :messages="$errors->get('condition')" class="mt-2" />
          </div>

          <!-- Brand & Model (Two columns) -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <x-input-label for="brand" :value="__('Brand (Optional)')" />
              <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand')" placeholder="e.g., Apple, Samsung, Nike" />
              <x-input-error :messages="$errors->get('brand')" class="mt-2" />
            </div>

            <div>
              <x-input-label for="model" :value="__('Model (Optional)')" />
              <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" placeholder="e.g., iPhone 13, Galaxy S21" />
              <x-input-error :messages="$errors->get('model')" class="mt-2" />
            </div>
          </div>

          <!-- Description -->
          <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required placeholder="Describe your item in detail...">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <p class="text-xs text-gray-500 mt-1">Include condition, features, and any important details</p>
          </div>

          <!-- Image Upload -->
          <div>
            <x-input-label for="image" :value="__('Item Photo')" />
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition-colors">
              <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload a file</span>
                    <input id="image" name="image" type="file" class="sr-only" accept="image/*" required onchange="previewImage(event)">
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, WEBP up to 5MB</p>
              </div>
            </div>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />

            <!-- Image Preview -->
            <div id="imagePreview" class="mt-4 hidden">
              <img id="preview" src="" alt="Preview" class="max-w-xs rounded-lg shadow-md">
            </div>
          </div>

          <!-- Contact Method -->
          <div>
            <x-input-label for="contact_method" :value="__('Preferred Contact Method')" />
            <select id="contact_method" name="contact_method" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
              <option value="messenger" {{ old('contact_method', 'messenger') == 'messenger' ? 'selected' : '' }}>Messenger</option>
              <option value="facebook" {{ old('contact_method') == 'facebook' ? 'selected' : '' }}>Facebook</option>
              <option value="both" {{ old('contact_method') == 'both' ? 'selected' : '' }}>Both (Messenger & Facebook)</option>
            </select>
            <x-input-error :messages="$errors->get('contact_method')" class="mt-2" />
            <p class="text-xs text-gray-500 mt-1">How buyers can reach you</p>
          </div>

          <!-- Location -->
          <div>
            <x-input-label for="location" :value="__('Location')" />
            <select id="location" name="location" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
              <option value="">Select your location</option>
              <option value="Tagbilaran City" {{ old('location') == 'Tagbilaran City' ? 'selected' : '' }}>Tagbilaran City</option>
              <option value="Ubay" {{ old('location') == 'Ubay' ? 'selected' : '' }}>Ubay</option>
              <option value="Talibon" {{ old('location') == 'Talibon' ? 'selected' : '' }}>Talibon</option>
              <option value="Jagna" {{ old('location') == 'Jagna' ? 'selected' : '' }}>Jagna</option>
              <option value="Guindulman" {{ old('location') == 'Guindulman' ? 'selected' : '' }}>Guindulman</option>
              <option value="Trinidad" {{ old('location') == 'Trinidad' ? 'selected' : '' }}>Trinidad</option>
              <option value="Tubigon" {{ old('location') == 'Tubigon' ? 'selected' : '' }}>Tubigon</option>
              <option value="Calape" {{ old('location') == 'Calape' ? 'selected' : '' }}>Calape</option>
              <option value="Loon" {{ old('location') == 'Loon' ? 'selected' : '' }}>Loon</option>
              <option value="Inabanga" {{ old('location') == 'Inabanga' ? 'selected' : '' }}>Inabanga</option>
              <option value="Getafe" {{ old('location') == 'Getafe' ? 'selected' : '' }}>Getafe</option>
              <option value="Dauis" {{ old('location') == 'Dauis' ? 'selected' : '' }}>Dauis</option>
              <option value="Panglao" {{ old('location') == 'Panglao' ? 'selected' : '' }}>Panglao</option>
              <option value="Loay" {{ old('location') == 'Loay' ? 'selected' : '' }}>Loay</option>
              <option value="Loboc" {{ old('location') == 'Loboc' ? 'selected' : '' }}>Loboc</option>
              <option value="Carmen" {{ old('location') == 'Carmen' ? 'selected' : '' }}>Carmen</option>
              <option value="Garcia Hernandez" {{ old('location') == 'Garcia Hernandez' ? 'selected' : '' }}>Garcia Hernandez</option>
              <option value="Valencia" {{ old('location') == 'Valencia' ? 'selected' : '' }}>Valencia</option>
              <option value="Dimiao" {{ old('location') == 'Dimiao' ? 'selected' : '' }}>Dimiao</option>
              <option value="Clarin" {{ old('location') == 'Clarin' ? 'selected' : '' }}>Clarin</option>
              <option value="Catigbian" {{ old('location') == 'Catigbian' ? 'selected' : '' }}>Catigbian</option>
              <option value="Sagbayan" {{ old('location') == 'Sagbayan' ? 'selected' : '' }}>Sagbayan</option>
              <option value="Bilar" {{ old('location') == 'Bilar' ? 'selected' : '' }}>Bilar</option>
              <option value="Batuan" {{ old('location') == 'Batuan' ? 'selected' : '' }}>Batuan</option>
              <option value="Balilihan" {{ old('location') == 'Balilihan' ? 'selected' : '' }}>Balilihan</option>
              <option value="Cortes" {{ old('location') == 'Cortes' ? 'selected' : '' }}>Cortes</option>
              <option value="Corella" {{ old('location') == 'Corella' ? 'selected' : '' }}>Corella</option>
              <option value="Maribojoc" {{ old('location') == 'Maribojoc' ? 'selected' : '' }}>Maribojoc</option>
              <option value="Antequera" {{ old('location') == 'Antequera' ? 'selected' : '' }}>Antequera</option>
              <option value="Lila" {{ old('location') == 'Lila' ? 'selected' : '' }}>Lila</option>
              <option value="Baclayon" {{ old('location') == 'Baclayon' ? 'selected' : '' }}>Baclayon</option>
              <option value="Alburquerque" {{ old('location') == 'Alburquerque' ? 'selected' : '' }}>Alburquerque</option>
              <option value="Sikatuna" {{ old('location') == 'Sikatuna' ? 'selected' : '' }}>Sikatuna</option>
              <option value="Sevilla" {{ old('location') == 'Sevilla' ? 'selected' : '' }}>Sevilla</option>
              <option value="Alicia" {{ old('location') == 'Alicia' ? 'selected' : '' }}>Alicia</option>
              <option value="Mabini" {{ old('location') == 'Mabini' ? 'selected' : '' }}>Mabini</option>
              <option value="Candijay" {{ old('location') == 'Candijay' ? 'selected' : '' }}>Candijay</option>
              <option value="Anda" {{ old('location') == 'Anda' ? 'selected' : '' }}>Anda</option>
              <option value="Duero" {{ old('location') == 'Duero' ? 'selected' : '' }}>Duero</option>
              <option value="Sierra Bullones" {{ old('location') == 'Sierra Bullones' ? 'selected' : '' }}>Sierra Bullones</option>
              <option value="San Miguel" {{ old('location') == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
              <option value="Pilar" {{ old('location') == 'Pilar' ? 'selected' : '' }}>Pilar</option>
              <option value="Dagohoy" {{ old('location') == 'Dagohoy' ? 'selected' : '' }}>Dagohoy</option>
              <option value="Danao" {{ old('location') == 'Danao' ? 'selected' : '' }}>Danao</option>
              <option value="Bien Unido" {{ old('location') == 'Bien Unido' ? 'selected' : '' }}>Bien Unido</option>
              <option value="Buenavista" {{ old('location') == 'Buenavista' ? 'selected' : '' }}>Buenavista</option>
              <option value="Trinidad" {{ old('location') == 'Trinidad' ? 'selected' : '' }}>Trinidad</option>
            </select>
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
            <p class="text-xs text-gray-500 mt-1">Select your municipality in Bohol</p>
          </div>

          <!-- Submit Buttons -->
          <div class="flex items-center justify-between pt-4 border-t border-gray-200">
            <a href="{{ route('dashboard') }}" class="btn-secondary inline-flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              Cancel
            </a>
            <button type="submit" class="btn-primary inline-flex items-center gap-2 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-105 transition-all">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              Post Item
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Tips Card -->
    <div class="mt-6 card p-6 bg-gradient-to-br from-blue-50 to-teal-50 border border-blue-200">
      <div class="flex items-start gap-3">
        <div class="p-2 bg-trade-blue rounded-lg flex-shrink-0">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
          </svg>
        </div>
        <div>
          <h3 class="font-bold text-gray-900 mb-2">💡 Tips for a Great Listing</h3>
          <ul class="text-sm text-gray-700 space-y-2">
            <li class="flex items-start gap-2">
              <span class="text-trade-teal">✓</span>
              <span>Use clear, well-lit photos showing all angles</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-trade-teal">✓</span>
              <span>Write detailed, honest descriptions</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-trade-teal">✓</span>
              <span>Set fair, competitive prices</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-trade-teal">✓</span>
              <span>Include your location for local buyers</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-trade-teal">✓</span>
              <span>Respond quickly to interested buyers</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>

  @push('scripts')
  <script>
    function previewImage(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('preview').src = e.target.result;
          document.getElementById('imagePreview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
      }
    }
  </script>
  @endpush
</x-sidebar-layout>