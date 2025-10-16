<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Toggle favorite status for an item
     */
    public function toggle(Item $item)
    {
        $user = Auth::user();

        // Check if already favorited
        $favorite = Favorite::where('user_id', $user->id)
            ->where('item_id', $item->id)
            ->first();

        if ($favorite) {
            // Remove from favorites
            $favorite->delete();
            $isFavorited = false;
            $message = 'Removed from favorites';
        } else {
            // Add to favorites
            Favorite::create([
                'user_id' => $user->id,
                'item_id' => $item->id,
            ]);
            $isFavorited = true;
            $message = 'Added to favorites';
        }

        // Get updated count
        $favoritesCount = $item->favorites()->count();

        // Always return JSON for AJAX requests
        return response()->json([
            'success' => true,
            'is_favorited' => $isFavorited,
            'favorites_count' => $favoritesCount,
            'message' => $message,
        ]);
    }
    /**
     * Show user's favorite items
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $favorites = $user->favorites()
            ->with(['item.user'])
            ->latest()
            ->paginate(20);

        return view('favorites.index', compact('favorites'));
    }
}
