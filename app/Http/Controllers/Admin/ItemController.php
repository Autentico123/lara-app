<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
  /**
   * Display a listing of items.
   */
  public function index(Request $request)
  {
    $query = Item::with(['user', 'reports'])
      ->withCount(['favorites', 'comments', 'reports']);

    // Search filter
    if ($request->filled('search')) {
      $search = $request->search;
      $query->where(function ($q) use ($search) {
        $q->where('item_name', 'like', "%{$search}%")
          ->orWhere('description', 'like', "%{$search}%")
          ->orWhereHas('user', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
          });
      });
    }

    // Category filter
    if ($request->filled('category')) {
      $query->where('category', $request->category);
    }

    // Status filter (flagged items with reports)
    if ($request->filled('status')) {
      if ($request->status === 'flagged') {
        $query->has('reports');
      }
    }

    // Sort options
    $sortBy = $request->get('sort', 'latest');
    switch ($sortBy) {
      case 'oldest':
        $query->oldest();
        break;
      case 'price_high':
        $query->orderBy('price', 'desc');
        break;
      case 'price_low':
        $query->orderBy('price', 'asc');
        break;
      case 'most_viewed':
        $query->orderBy('views', 'desc');
        break;
      case 'most_favorited':
        $query->orderByDesc('favorites_count');
        break;
      case 'most_reported':
        $query->orderByDesc('reports_count');
        break;
      default:
        $query->latest();
    }

    $items = $query->paginate(20)->withQueryString();

    // Get categories for filter
    $categories = Item::select('category')
      ->distinct()
      ->pluck('category');

    // Statistics
    $stats = [
      'total' => Item::count(),
      'flagged' => Item::has('reports')->count(),
      'total_views' => Item::sum('views'),
      'total_favorites' => DB::table('favorites')->count(),
    ];

    return view('admin.items.index', compact('items', 'categories', 'stats'));
  }

  /**
   * Display the specified item.
   */
  public function show(Item $item)
  {
    $item->load([
      'user',
      'comments.user',
      'favorites.user',
      'reports' => function ($query) {
        $query->with('user')->latest();
      }
    ]);

    return view('admin.items.show', compact('item'));
  }

  /**
   * Update the specified item.
   */
  public function update(Request $request, Item $item)
  {
    $request->validate([
      'item_name' => 'required|string|max:255',
      'description' => 'required|string',
      'price' => 'required|numeric|min:0',
      'category' => 'required|string',
    ]);

    $item->update($request->only(['item_name', 'description', 'price', 'category']));

    return redirect()
      ->route('admin.items.show', $item)
      ->with('success', 'Item updated successfully.');
  }

  /**
   * Remove the specified item.
   */
  public function destroy(Item $item)
  {
    // Delete the item image
    if ($item->image) {
      Storage::disk('public')->delete($item->image);
    }

    // Delete the item (cascades to favorites, comments)
    $item->delete();

    return redirect()
      ->route('admin.items.index')
      ->with('success', 'Item deleted successfully.');
  }

  /**
   * Bulk delete items.
   */
  public function bulkDestroy(Request $request)
  {
    $request->validate([
      'item_ids' => 'required|array',
      'item_ids.*' => 'exists:items,id',
    ]);

    $items = Item::whereIn('id', $request->item_ids)->get();

    foreach ($items as $item) {
      // Delete images
      if ($item->image) {
        Storage::disk('public')->delete($item->image);
      }
      $item->delete();
    }

    return redirect()
      ->route('admin.items.index')
      ->with('success', count($request->item_ids) . ' items deleted successfully.');
  }

  /**
   * Dismiss all reports for an item.
   */
  public function dismissReports(Item $item)
  {
    $item->reports()->delete();

    return redirect()
      ->back()
      ->with('success', 'All reports for this item have been dismissed.');
  }
}
