<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; // Global Controller sınıfını içe aktar
use App\Models\AboutCard;
use Illuminate\Http\Request;

class AboutCardController extends Controller
{
    // Listeleme
    public function index()
    {
        $aboutCards = AboutCard::all();
        return view('pages.pages-admin.pages_about.page-index', compact('aboutCards'));
    }

    // Ekleme Formu
    public function create()
    {
        return view('pages.pages-admin.pages_about.page-create-edit', ['aboutCard' => null]);
    }

    // Yeni Kayıt
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:1000', // Açıklama zorunlu ve 1000 karakter ile sınırlı
        ]);

        AboutCard::create($validated);

        return redirect()->route('about-card.index')->with('success', 'Hakkımda Kartı başarıyla eklendi!');
    }

    // Düzenleme Formu
    public function edit($id)
    {
        $aboutCard = AboutCard::findOrFail($id);
        return view('pages.pages-admin.pages_about.page-create-edit', compact('aboutCard'));
    }

    // Güncelleme
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:1000',
        ]);

        $aboutCard = AboutCard::findOrFail($id);
        $aboutCard->update($validated);

        return redirect()->route('about-card.index')->with('success', 'Hakkımda Kartı başarıyla güncellendi!');
    }

    // Silme
    public function destroy($id)
    {
        $aboutCard = AboutCard::findOrFail($id);
        $aboutCard->delete();

        return redirect()->route('about-card.index')->with('success', 'Hakkımda Kartı başarıyla silindi!');
    }
}