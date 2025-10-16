<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ItemController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of items.
     */
    public function index(Request $request)
    {
        $query = Item::with('user')->active();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('item_name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category') && $request->get('category') !== '') {
            $query->category($request->get('category'));
        }

        // Sort options
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'popular':
                $query->orderBy('views', 'desc');
                break;
            default:
                $query->latest();
        }

        $items = $query->paginate(20);

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new item.
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:100',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB max
            'location' => 'nullable|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
            $validated['image'] = $imagePath;
        }

        // Add user_id and default status
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'active';

        $item = Item::create($validated);

        return redirect()->route('items.show', $item)
            ->with('success', '🎉 Item posted successfully!');
    }

    /**
     * Display the specified item.
     */
    public function show(Item $item)
    {
        // Increment views (only once per session and not for owner)
        $viewedItems = session()->get('viewed_items', []);

        if (!in_array($item->id, $viewedItems) && (!Auth::check() || Auth::id() !== $item->user_id)) {
            $item->incrementViews();
            $viewedItems[] = $item->id;
            session()->put('viewed_items', $viewedItems);
        }

        $item->load(['user', 'comments.user']);

        // Get similar items
        $similarItems = Item::active()
            ->where('category', $item->category)
            ->where('id', '!=', $item->id)
            ->limit(8)
            ->get();

        return view('items.show', compact('item', 'similarItems'));
    }

    /**
     * Show the form for editing the specified item.
     */
    public function edit(Item $item)
    {
        $this->authorize('update', $item);
        $categories = $this->getCategories();
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified item in storage.
     */
    public function update(Request $request, Item $item)
    {
        $this->authorize('update', $item);

        $validated = $request->validate([
            'item_name' => 'required|string|max:100',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:active,sold,draft',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $imagePath = $request->file('image')->store('items', 'public');
            $validated['image'] = $imagePath;
        }

        $item->update($validated);

        return redirect()->route('items.show', $item)
            ->with('success', '✅ Item updated successfully!');
    }

    /**
     * Remove the specified item from storage.
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);

        // Delete image
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('dashboard')
            ->with('success', '🗑️ Item deleted successfully!');
    }

    /**
     * Get available categories.
     */
    private function getCategories(): array
    {
        return [
            'Electronics' => '📱 Electronics',
            'Fashion' => '👕 Fashion',
            'Home & Garden' => '🏠 Home & Garden',
            'Sports & Outdoors' => '⚽ Sports & Outdoors',
            'Toys & Games' => '🎮 Toys & Games',
            'Books & Media' => '📚 Books & Media',
            'Automotive' => '🚗 Automotive',
            'Health & Beauty' => '💄 Health & Beauty',
            'Pets' => '🐾 Pets',
            'Other' => '📦 Other',
        ];
    }
}
