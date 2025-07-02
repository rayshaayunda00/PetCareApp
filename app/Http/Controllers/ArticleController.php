<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // Tampilkan semua artikel ke publik
    public function indexPublic()
{
    $articles = Article::latest()->paginate(6); // bisa pakai ->get() kalau tidak pakai pagination
    return view('public.articles.index', compact('articles'));
}

    // Detail artikel berdasarkan slug
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('public.articles.show', compact('article'));
    }

    // Admin: daftar artikel
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    // Admin: form tambah artikel
    public function create()
    {
        return view('admin.articles.create');
    }

    // Admin: simpan artikel

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('articles', 'public');
    }

    Article::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
        // 'slug' otomatis dari boot() di model
    ]);

    return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
}

    // Admin: edit form
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    // Admin: update artikel
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
    'judul' => 'required|max:255',
    'isi' => 'required',
    'gambar_cover' => 'nullable|image|max:2048'
]);


        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    // Admin: hapus artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image && \Storage::disk('public')->exists($article->image)) {
            \Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
