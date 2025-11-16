<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with key metrics.
     */
    public function dashboard()
    {
        // Calculate key metrics
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $activeItems = Item::where('status', 'active')->count();
        $pendingReports = Report::where('status', 'pending')->count();
        $todaySignups = User::whereDate('created_at', today())->count();

        // Get recent users (last 5)
        $recentUsers = User::latest()
            ->take(5)
            ->withCount('items')
            ->get();

        // Get items statistics by category
        $itemsByCategory = Item::select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->orderBy('count', 'desc')
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'activeItems',
            'pendingReports',
            'todaySignups',
            'recentUsers',
            'itemsByCategory'
        ));
    }
}
