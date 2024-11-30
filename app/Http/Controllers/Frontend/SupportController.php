<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    public function index()
    {
        $siteSettings = SiteSetting::first();
        return view('pages.pages-frontend.pages_support.support-page', compact('siteSettings'));
    }
    public function store(Request $request)
    {
        // Form doğrulaması
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'budget' => 'required|string|max:255',
            'project_description' => 'required|string',
            'has_logo' => 'required|string',
            'deadline' => 'required|string|max:255',
            'page_count' => 'required|string|max:255',
            'has_hosting' => 'nullable|string',
            'website_type' => 'nullable|string',
            'use_existing_content' => 'nullable|string',
            'target_audience' => 'required|string|max:255',
            'color_preferences' => 'nullable|string|max:255',
            'competitor_websites' => 'nullable|string',
            'liked_websites' => 'nullable|string',
            'additional_comments' => 'nullable|string',
        ]);

        // Veriyi veritabanına kaydet
        Support::create($validated);

        // Kullanıcıya başarı mesajı gönder
        return redirect()->back()->with('success', 'Form başarıyla gönderildi.');
    }
}
