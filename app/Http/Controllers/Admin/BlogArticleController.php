<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogArticle;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = BlogCategory::all(); // Tüm kategorileri al
        $query = BlogArticle::with('category');

        // Filtreleme varsa
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $articles = $query->get();

        return view('admin.blog-article.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog-article.create-edit', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'is_visible' => 'nullable|boolean',
            'category_id' => 'nullable|exists:blog_categories,id',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['is_visible'] = $request->has('is_visible'); // Checkbox kontrolü

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog-articles', 'public');
        }

        BlogArticle::create($data);

        return redirect()->route('admin.blog-article.index')->with('success', 'Makale başarıyla eklendi.');
    }
    public function edit(BlogArticle $blogArticle)
    {
        $categories = BlogCategory::all();
        return view('admin.blog-article.create-edit', compact('blogArticle', 'categories'));
    }
    public function update(Request $request, BlogArticle $blogArticle)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'is_visible' => 'nullable|boolean',
            'category_id' => 'nullable|exists:blog_categories,id',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['is_visible'] = $request->has('is_visible'); // Checkbox kontrolü

        if ($request->hasFile('image')) {
            if ($blogArticle->image) {
                Storage::disk('public')->delete($blogArticle->image);
            }
            $data['image'] = $request->file('image')->store('blog-articles', 'public');
        }

        $blogArticle->update($data);

        return redirect()->route('admin.blog-article.index')->with('success', 'Makale başarıyla güncellendi.');
    }
    public function destroy(BlogArticle $blogArticle)
    {
        if ($blogArticle->image) {
            Storage::disk('public')->delete($blogArticle->image);
        }

        $blogArticle->delete();
        return redirect()->route('admin.blog-article.index')->with('success', 'Makale başarıyla silindi.');
    }
}