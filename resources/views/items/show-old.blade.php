<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <a href="{{ route('items.index') }}" class="text-gray-600 hover:text-gray-900">
        ← Back to Browse
      </a>
      @auth
      @can('update', $item)
      <div class="flex gap-2">
        <a href="{{ route('items.edit', $item) }}" class="bg-amber-500 hover:bg-amber-600 text-white font-semibold px-4 py-2 rounded-md transition-colors duration-200">
          ✏️ Edit
        </a>
        <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md transition-colors duration-200">
            🗑️ Delete
          </button>
        </form>
      </div>
      @endcan
      @endauth
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <!-- Success Messages -->
      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
        {{ session('success') }}
      </div>
      @endif

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Image & Description -->
        <div class="lg:col-span-2 space-y-6">

          <!-- Item Image -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" class="w-full h-96 object-cover">
          </div>

          <!-- Item Details -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Category -->
            <span class="inline-block bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full mb-3">
              {{ $item->category }}
            </span>

            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $item->item_name }}</h1>

            <!-- Price & Favorite -->
            <div class="flex items-center justify-between mb-4">
              <p class="text-4xl font-bold text-amber-600">${{ number_format($item->price, 2) }}</p>

              @auth
              <form action="{{ route('favorites.toggle', $item) }}" method="POST" class="favorite-form">
                @csrf
                <button type="submit" class="flex items-center gap-2 px-4 py-2 rounded-md transition-colors duration-200 {{ $item->isFavoritedBy(auth()->user()) ? 'bg-red-100 text-red-600 hover:bg-red-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                  <span class="text-2xl">{{ $item->isFavoritedBy(auth()->user()) ? '❤️' : '🤍' }}</span>
                  <span class="font-semibold favorite-count">{{ $item->favoritesCount() }}</span>
                </button>
              </form>
              @else
              <a href="{{ route('login') }}" class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-md transition-colors duration-200">
                <span class="text-2xl">🤍</span>
                <span class="font-semibold">{{ $item->favoritesCount() }}</span>
              </a>
              @endauth
            </div>

            <!-- Meta Info -->
            <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-6 pb-6 border-b">
              @if($item->location)
              <span class="flex items-center gap-1">
                📍 {{ $item->location }}
              </span>
              @endif
              <span class="flex items-center gap-1">
                👁️ {{ $item->views }} views
              </span>
              <span class="flex items-center gap-1">
                ⏰ {{ $item->created_at->diffForHumans() }}
              </span>
            </div>

            <!-- Description -->
            <div>
              <h2 class="text-xl font-semibold text-gray-900 mb-3">Description</h2>
              <p class="text-gray-700 whitespace-pre-line">{{ $item->description }}</p>
            </div>
          </div>

          <!-- Comments Section -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">💬 Comments (<span id="comments-count">{{ $item->comments->count() }}</span>)</h2>

            <!-- Comment Form -->
            @auth
            <form action="{{ route('comments.store', $item) }}" method="POST" class="mb-6" id="comment-form">
              @csrf
              <textarea name="message" id="comment-message" rows="3" placeholder="Write a comment..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-2" required></textarea>
              @error('message')
              <p class="text-red-500 text-xs mb-2">{{ $message }}</p>
              @enderror
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md transition-colors duration-200">
                Post Comment
              </button>
            </form>
            @else
            <p class="text-gray-600 mb-6">
              <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium">Sign in</a> to leave a comment
            </p>
            @endauth

            <!-- Comments List -->
            <div class="space-y-4" id="comments-list">
              @forelse($item->comments as $comment)
              <div class="flex gap-3 pb-4 border-b last:border-0" data-comment-id="{{ $comment->id }}">
                <img src="{{ $comment->user->avatarUrl() }}" alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                  <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-2">
                      <span class="font-semibold text-gray-900">{{ $comment->user->name }}</span>
                      <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    @auth
                    @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="delete-comment-form" onsubmit="return confirm('Delete this comment?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">
                        Delete
                      </button>
                    </form>
                    @endif
                    @endauth
                  </div>
                  <p class="text-gray-700">{{ $comment->message }}</p>
                </div>
              </div>
              @empty
              <p class="text-gray-500 text-center py-6" id="no-comments">No comments yet. Be the first to comment!</p>
              @endforelse
            </div>
          </div>

        </div>

        <!-- Right Column: Seller Info & Actions -->
        <div class="space-y-6">

          <!-- Seller Card -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Seller Information</h2>

            <div class="flex items-center gap-3 mb-4">
              <img src="{{ $item->user->avatarUrl() }}" alt="{{ $item->user->name }}" class="w-16 h-16 rounded-full">
              <div>
                <h3 class="font-semibold text-gray-900">{{ $item->user->name }}</h3>
                @if($item->user->location)
                <p class="text-sm text-gray-600">📍 {{ $item->user->location }}</p>
                @endif
              </div>
            </div>

            @if($item->user->bio)
            <p class="text-gray-700 text-sm mb-4 pb-4 border-b">{{ $item->user->bio }}</p>
            @endif

            <!-- Contact Buttons -->
            <div class="space-y-2">
              @if($item->user->facebook_link)
              <a href="{{ $item->user->facebook_link }}" target="_blank" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-medium text-center px-4 py-2 rounded-md transition-colors duration-200">
                Facebook
              </a>
              @endif

              @if($item->user->messenger_link)
              <a href="{{ $item->user->messenger_link }}" target="_blank" class="block w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-medium text-center px-4 py-2 rounded-md transition-colors duration-200">
                💬 Message on Messenger
              </a>
              @endif

              @if(!$item->user->facebook_link && !$item->user->messenger_link)
              <p class="text-gray-600 text-sm text-center py-4">
                Seller hasn't added social links yet
              </p>
              @endif
            </div>

            <!-- Seller Stats -->
            <div class="mt-6 pt-4 border-t grid grid-cols-2 gap-4 text-center">
              <div>
                <p class="text-2xl font-bold text-gray-900">{{ $item->user->items()->count() }}</p>
                <p class="text-xs text-gray-600">Listed Items</p>
              </div>
              <div>
                <p class="text-2xl font-bold text-gray-900">{{ $item->user->created_at->diffForHumans(null, false, true) }}</p>
                <p class="text-xs text-gray-600">Member Since</p>
              </div>
            </div>
          </div>

          <!-- Safety Tips -->
          <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
            <h3 class="font-semibold text-amber-900 mb-2">🛡️ Safety Tips</h3>
            <ul class="text-sm text-amber-800 space-y-1">
              <li>• Meet in a safe, public location</li>
              <li>• Check the item before you buy</li>
              <li>• Pay only after collecting item</li>
              <li>• Trust your instincts</li>
            </ul>
          </div>

        </div>

      </div>

      <!-- Similar Items -->
      @if($similarItems->count() > 0)
      <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Similar Items</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          @foreach($similarItems as $similarItem)
          <a href="{{ route('items.show', $similarItem) }}" class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition-all duration-200 hover:-translate-y-1">
            <div class="h-48 bg-gray-100">
              <img src="{{ asset('storage/' . $similarItem->image) }}" alt="{{ $similarItem->item_name }}" class="w-full h-full object-cover">
            </div>
            <div class="p-4">
              <p class="text-xs text-gray-500 mb-1">{{ $similarItem->category }}</p>
              <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">{{ $similarItem->item_name }}</h3>
              <p class="text-xl font-bold text-amber-600">${{ number_format($similarItem->price, 2) }}</p>
            </div>
          </a>
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
          
          if (data.success) {
            // Update icon
            icon.textContent = data.is_favorited ? '❤️' : '🤍';
            // Update count
            count.textContent = data.favorites_count;
            // Update button styling
            if (data.is_favorited) {
              button.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
              button.classList.add('bg-red-100', 'text-red-600', 'hover:bg-red-200');
            } else {
              button.classList.remove('bg-red-100', 'text-red-600', 'hover:bg-red-200');
              button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            }
          }
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
            body: JSON.stringify({ message }),
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
            newComment.className = 'flex gap-3 pb-4 border-b last:border-0';
            newComment.dataset.commentId = data.comment.id;
            newComment.innerHTML = `
              <img src="${data.comment.user_avatar}" alt="${data.comment.user_name}" class="w-10 h-10 rounded-full">
              <div class="flex-1">
                <div class="flex items-center justify-between mb-1">
                  <div class="flex items-center gap-2">
                    <span class="font-semibold text-gray-900">${data.comment.user_name}</span>
                    <span class="text-xs text-gray-500">${data.comment.created_at}</span>
                  </div>
                  ${data.comment.can_delete ? `
                    <form action="/comments/${data.comment.id}" method="POST" class="delete-comment-form" onsubmit="return confirm('Delete this comment?');">
                      <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').content}">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">
                        Delete
                      </button>
                    </form>
                  ` : ''}
                </div>
                <p class="text-gray-700">${data.comment.message}</p>
              </div>
            `;
            commentsList.insertBefore(newComment, commentsList.firstChild);

            // Update comments count
            document.getElementById('comments-count').textContent = data.comments_count;
          }
        } catch (error) {
          console.error('Error:', error);
          alert('Failed to post comment. Please try again.');
        }
      });
    }

    // AJAX for Comment Delete
    document.addEventListener('click', async function(e) {
      if (e.target.closest('.delete-comment-form button[type="submit"]')) {
        e.preventDefault();

        if (!confirm('Delete this comment?')) return;

        const form = e.target.closest('.delete-comment-form');
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
              commentsList.innerHTML = '<p class="text-gray-500 text-center py-6" id="no-comments">No comments yet. Be the first to comment!</p>';
            }
          }
        } catch (error) {
          console.error('Error:', error);
          alert('Failed to delete comment. Please try again.');
        }
      }
    });
  </script>
</x-app-layout>