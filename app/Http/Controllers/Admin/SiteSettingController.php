<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first() ?? new SiteSetting();
        return view('pages.pages-admin.pages_site-settings.index', compact('settings'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'header_title' => 'required|max:255',
            'header_subtitle' => 'required|max:255',
            'footer_text' => 'required|max:255',
            'footer_year' => 'required|numeric|min:1900|max:' . date('Y'),
        ]);

        $settings = SiteSetting::first() ?? new SiteSetting();
        $settings->fill($request->all());
        $settings->save();

        return redirect()->route('site-settings.index')->with('success', 'Site ayarları başarıyla güncellendi.');
    }
}