<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::with('parent')->get();
        return view('pages.pages-admin.pages_blog-category.index', compact('categories'));
    }

    public function create()
    {
        $categories = BlogCategory::all(); // Üst kategori seçimi için tüm kategorileri gönderiyoruz
        return view('pages.pages-admin.pages_blog-category.create-edit', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug',
            'parent_id' => 'nullable|exists:blog_categories,id',
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        // Slug benzersiz değilse üzerine sayı ekle
        $originalSlug = $slug;
        $counter = 1;
        while (BlogCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        BlogCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'tags' => $request->tags,
            'image' => $request->file('image') ? $request->file('image')->store('category_images') : null,
            'parent_id' => $request->parent_id,
            'is_visible' => $request->has('is_visible') ? true : false,
        ]);

        return redirect()->route('admin.blog-category.index')->with('success', 'Kategori başarıyla eklendi.');
    }

    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        $categories = BlogCategory::where('id', '!=', $id)->get(); // Kendisi hariç diğer kategoriler
        return view('pages.pages-admin.pages_blog-category.create-edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug,' . $id,
            'parent_id' => 'nullable|exists:blog_categories,id',
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        // Slug benzersiz değilse üzerine sayı ekle
        $originalSlug = $slug;
        $counter = 1;
        while (BlogCategory::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'tags' => $request->tags,
            'image' => $request->file('image') ? $request->file('image')->store('category_images') : $category->image,
            'parent_id' => $request->parent_id,
            'is_visible' => $request->has('is_visible') ? true : false,
        ]);

        return redirect()->route('admin.blog-category.index')->with('success', 'Kategori başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        BlogCategory::findOrFail($id)->delete();
        return redirect()->route('admin.blog-category.index')->with('success', 'Kategori başarıyla silindi.');
    }
}