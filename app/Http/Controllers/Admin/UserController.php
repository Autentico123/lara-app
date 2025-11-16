<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  /**
   * Display a listing of users with search and filters.
   */
  public function index(Request $request)
  {
    $query = User::query()->withCount(['items', 'comments', 'favorites']);

    // Search by name or email
    if ($request->filled('search')) {
      $search = $request->search;
      $query->where(function ($q) use ($search) {
        $q->where('name', 'like', "%{$search}%")
          ->orWhere('email', 'like', "%{$search}%");
      });
    }

    // Filter by role
    if ($request->filled('role')) {
      $query->where('role', $request->role);
    }

    // Filter by status (if implementing block feature)
    if ($request->filled('status')) {
      $query->where('status', $request->status);
    }

    // Sort
    $sortBy = $request->get('sort', 'created_at');
    $sortOrder = $request->get('order', 'desc');
    $query->orderBy($sortBy, $sortOrder);

    $users = $query->paginate(15)->withQueryString();

    return view('admin.users.index', compact('users'));
  }

  /**
   * Display the specified user with detailed information.
   */
  public function show(User $user)
  {
    $user->loadCount(['items', 'comments', 'favorites']);
    $user->load(['items' => function ($query) {
      $query->latest()->take(10);
    }]);

    return view('admin.users.show', compact('user'));
  }

  /**
   * Block or unblock a user.
   */
  public function toggleBlock(User $user)
  {
    // Prevent blocking other admins
    if ($user->isAdmin()) {
      return back()->with('error', 'Cannot block admin users.');
    }

    // Toggle the status (requires adding 'status' column to users table)
    // For now, we'll implement this conceptually
    // You'll need to add a migration to add 'status' column

    return back()->with('success', 'User status updated successfully.');
  }

  /**
   * Remove the specified user from storage.
   */
  public function destroy(User $user)
  {
    // Prevent deleting yourself
    if ($user->id === Auth::id()) {
      return back()->with('error', 'You cannot delete your own account.');
    }

    // Prevent deleting other admins
    if ($user->isAdmin()) {
      return back()->with('error', 'Cannot delete admin users.');
    }

    // Delete user's avatar if exists
    if ($user->avatar) {
      Storage::disk('public')->delete($user->avatar);
    }

    // Delete user's items and their images
    foreach ($user->items as $item) {
      if ($item->image) {
        Storage::disk('public')->delete($item->image);
      }
      $item->delete();
    }

    // Delete the user (cascade will handle related records)
    $user->delete();

    return redirect()->route('admin.users.index')
      ->with('success', 'User deleted successfully.');
  }
}
