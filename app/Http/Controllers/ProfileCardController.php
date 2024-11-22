<?php

namespace App\Http\Controllers;

use App\Models\ProfileCard;
use Illuminate\Http\Request;


class ProfileCardController extends Controller
{
    // Listeleme
    public function index()
    {
        $profileCards = ProfileCard::all();
        return view('admin.profile-card.index', compact('profileCards'));
    }

    // Ekleme Formu
    public function create()
    {
        return view('admin.profile-card.create-edit', ['profileCard' => null]);
    }

    // Düzenleme Formu
    public function edit($id)
    {
        $profileCard = ProfileCard::findOrFail($id);
        return view('admin.profile-card.create-edit', compact('profileCard'));
    }

    // Kayıt İşlemi
    public function store(Request $request)
    {
        $validated = $request->validate([
            //   'profile_image' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'github_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
        ]);

        // Dosya yükleme işlemi
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('profile_images', 'public');
            // dd($validated['profile_image']); // Yüklenen dosyanın yolunu görmek için ekrana yazdır
        }

        ProfileCard::create($validated);
        return redirect()->route('profile-card.index')->with('success', 'Profil Kartı başarıyla eklendi!');
    }

    // Güncelleme İşlemi
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'github_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
        ]);

        $profileCard = ProfileCard::findOrFail($id);

        // Dosya yükleme işlemi
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('profile_images', 'public');
            
        }
        $profileCard->update($validated);
        return redirect()->route('profile-card.index')->with('success', 'Profil Kartı başarıyla güncellendi!');
    }
    // Silme İşlemi
    public function destroy($id)
    {
        $profileCard = ProfileCard::findOrFail($id);
        $profileCard->delete();
        return redirect()->route('profile-card.index')->with('success', 'Profil Kartı başarıyla silindi!');
    }
}
