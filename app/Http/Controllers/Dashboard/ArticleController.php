<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'user')->get();
        return view('dashboard.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:draft,published',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content'     => 'nullable|string',
            'tags'        => 'nullable|string',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Article::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title), // ✅ perbaikan (bukan $request->name)
            'category_id' => $request->category_id,
            'user_id'     => Auth::id(),
            'status'      => $request->status,
            'thumbnail'   => $thumbnailPath,
            'views'       => 0,
            'content'     => $request->content, // HTML dari Quill
            'tags'        => $request->tags,
        ]);

        return redirect()->route('dashboard.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Article $article)
    {
        return view('dashboard.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('dashboard.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:draft,published',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content'     => 'nullable|string',
            'tags'        => 'nullable|string',
        ]);

        $thumbnailPath = $article->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update([
            'title'        => $request->title,
            'slug'        => Str::slug($request->name),
            'category_id' => $request->category_id,
            'status'      => $request->status,
            'thumbnail'   => $thumbnailPath,
            'content'     => $request->content,
            'tags'        => $request->tags,
        ]);

        return redirect()->route('dashboard.articles.index')->with('success', 'Artikel berhasil diupdate.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        return redirect()->route('dashboard.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
