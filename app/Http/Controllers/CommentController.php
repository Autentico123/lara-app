<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a new comment
     */
    public function store(Request $request, Item $item)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'item_id' => $item->id,
            'user_id' => Auth::id(),
            'message' => $validated['message'],
        ]);

        // Load user relationship for the response
        $comment->load('user');

        // Always return JSON
        return response()->json([
            'success' => true,
            'comment' => [
                'id' => $comment->id,
                'message' => $comment->message,
                'user_name' => $comment->user->name,
                'user_avatar' => $comment->user->avatarUrl(),
                'created_at' => $comment->created_at->diffForHumans(),
                'can_delete' => Auth::id() === $comment->user_id,
            ],
            'comments_count' => $item->comments()->count(),
        ]);
    }

    /**
     * Delete a comment
     */
    public function destroy(Comment $comment)
    {
        // Check authorization: only comment owner can delete
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $itemId = $comment->item_id;
        $comment->delete();

        // Always return JSON
        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully',
        ]);
    }
}
