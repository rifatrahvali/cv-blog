<?php

namespace App\Http\Controllers;

use App\Models\BlogArticle;
use App\Models\BlogCategory;
use App\Models\SiteSetting;// ProfileCard Modeli dahil ediyoruz.

class BlogController extends Controller
{
    public function index()
    {
        // Tüm blogları ilişkili kategorileriyle birlikte al
        $siteSettings = SiteSetting::first();
        $blogs = BlogArticle::with('category')
            ->where('is_visible', true) // Sadece görünür olanları al
            ->orderBy('created_at', 'desc')
            ->get();

        // Tüm kategorileri ve her bir kategorideki blog sayısını al
        $categories = BlogCategory::withCount('articles')->get();

        // return view('components.frontend.blog.all-blogs', compact('blogs', 'categories', 'siteSettings'));
        return view('frontend.blogs.all-blogs-page', compact('blogs', 'categories', 'siteSettings'));
    }
    public function show($slug)
    {
        $blog = BlogArticle::where('slug', $slug)
            ->with('category') // Kategori ilişkisi
            ->firstOrFail();
        $siteSettings = SiteSetting::first();
        // Tüm kategorileri ve her bir kategorideki blog sayısını al
        $categories = BlogCategory::withCount('articles')->get();

        // return view('components.frontend.blog.blog-detail', compact('blog', 'categories', 'siteSettings'));
        return view('frontend.blogs.blog-detail-page', compact('blog', 'categories', 'siteSettings'));
    }

    public function filterByCategory($slug)
    {
        // Kategoriyi slug üzerinden al
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $siteSettings = SiteSetting::first();
        // O kategoriye ait blogları al (sadece görünenler)
        $blogs = BlogArticle::where('category_id', $category->id)
            ->where('is_visible', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Kategorileri listele (sidebar için)
        $categories = BlogCategory::withCount('articles')->get();

        // Görünümü döndür
        return view('components.frontend.blog.filtered-blogs', compact('blogs', 'category', 'categories', 'siteSettings'));
    }

}