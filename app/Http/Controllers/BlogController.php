<?php

namespace App\Http\Controllers;

use App\Models\BlogArticle;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        // Tüm blogları ilişkili kategorileriyle birlikte al
        $blogs = BlogArticle::with('category')
            ->where('is_visible', true) // Sadece görünür olanları al
            ->orderBy('created_at', 'desc')
            ->get();

        // Tüm kategorileri ve her bir kategorideki blog sayısını al
        $categories = BlogCategory::withCount('articles')->get();

        return view('components.frontend.blog.all-blogs', compact('blogs', 'categories'));
    }
    public function show($slug)
    {
        $blog = BlogArticle::where('slug', $slug)->with('category')->firstOrFail();
        return view('components.frontend.blog.blog-detail', compact('blog'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $blogs = BlogArticle::where('category_id', $category->id)
            ->where('is_visible', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.frontend.blog.filtered-blogs', compact('category', 'blogs'));
    }
}