<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        // Ambil artikel terbaru yang status = "published"
        $articles = Article::with(['category', 'user'])
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(6); // tampilkan 6 artikel per halaman

        // Ambil kategori untuk sidebar
        $categories = Category::orderBy('name')->get();
        return view('index', compact('articles', 'categories'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function Articleindex()
    {
        $articles = Article::with(['category', 'user'])
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(6); // tampilkan 6 artikel per halaman

        return view('article-index', compact('articles'));
    }

    public function Articleshow($slug)
    {
        // Cari artikel berdasarkan slug
        $article = Article::with(['category', 'user'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Tambah jumlah views
        $article->increment('views');

        return view('article-show', compact('article'));
    }

    public function tag($tag)
    {
        // Ambil semua artikel yang mengandung tag ini
        $articles = \App\Models\Article::where('tags', 'like', "%{$tag}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(10); // pagination 10 artikel per halaman

        return view('article-tag', compact('articles', 'tag'));
    }

    public function Categoriindex()
    {
        $categories = Category::paginate(6);
        return view('categori-index', compact('categories'));
    }

    public function Categoriesshow($slug)
    {
        // Cari kategori
        $category = Category::where('slug', $slug)->firstOrFail();

        // Ambil artikel berdasarkan kategori
        $articles = Article::with(['category', 'user'])
            ->where('category_id', $category->id)
            ->where('status', 'published')
            ->latest()
            ->paginate(6);

        return view('categori-show', compact('category', 'articles'));
    }
}
