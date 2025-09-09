<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
    // 🔹 Show Dashboard
    public function index()
    {
        $totalArticles = Article::count();
        $totalUsers = User::count();
        $totalCategories = Category::count();
        // 🔹 Ambil 5 artikel terbaru (urutkan berdasarkan tanggal dibuat)
        $recentArticles = Article::with(['user', 'category']) // eager loading biar hemat query
            ->latest() // order by created_at DESC
            ->take(5)  // hanya ambil 5 artikel terakhir
            ->get();

        // 🔹 Ambil 5 pengguna terbaru (urutkan berdasarkan tanggal dibuat)
        $recentUsers = User::latest()
            ->take(5)
            ->get();
        return view('dashboard.index', compact('totalArticles', 'totalUsers', 'totalCategories', 'recentArticles', 'recentUsers'));
    }
}
