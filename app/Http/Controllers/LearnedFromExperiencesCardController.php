<?php

namespace App\Http\Controllers;

use App\Models\LearnedFromExperiencesCard; // Model sınıfını dahil ediyoruz.
use App\Models\ExperienceCard; // Deneyim kartlarını listelemek için ekleniyor.
use Illuminate\Http\Request; // HTTP isteklerini işlemek için kullanılır.

class LearnedFromExperiencesCardController extends Controller
{
    // Listeleme metodu
    public function index()
    {
        // Tüm kayıtları alıyoruz.
        $learnedFromExperiencesCards = LearnedFromExperiencesCard::with('experience')->get();
        // Görünüme verileri gönderiyoruz.
        return view('admin.learned-from-experiences-card.index', compact('learnedFromExperiencesCards'));
    }

    // Yeni kayıt ekleme formu
    public function create()
    {
        // Tüm deneyim kartlarını alıyoruz (dropdown için).
        $experienceCards = ExperienceCard::all();
        // Görünüme boş bir model ve deneyim kartlarını gönderiyoruz.
        return view('admin.learned-from-experiences-card.create-edit', [
            'learnedFromExperiencesCard' => null,
            'experienceCards' => $experienceCards,
        ]);
    }

    // Yeni kayıt ekleme işlemi
    public function store(Request $request)
{
    // Form doğrulama kuralları
    $validated = $request->validate([
        'experience_card_id' => 'required|exists:experience_cards,id', // Geçerli bir deneyim kartı ID'si olmalı.
        'sentence' => 'required|string|max:255', // Geçerli bir deneyim kartı ID'si olmalı.
        'section' => 'required|string|max:100',// Bölüm adı zorunlu.
        'work_tags' => 'nullable|string', // Girdi olarak bir dizi değil, string bekliyoruz
    ]);

    // work_tags alanını virgülle ayrılmış bir string'den bir diziye dönüştürme
    $validated['work_tags'] = $validated['work_tags'] ? explode(',', $validated['work_tags']) : [];

    // Yeni kayıt oluşturma
    LearnedFromExperiencesCard::create($validated);

    return redirect()->route('learned-from-experiences-card.index')->with('success', 'Kayıt başarıyla eklendi!');
}
    // Düzenleme formu
    public function edit($id)
    {
        // Düzenlenecek kaydı buluyoruz.
        $learnedFromExperiencesCard = LearnedFromExperiencesCard::findOrFail($id);
        // Dropdown için tüm deneyim kartlarını alıyoruz.
        $experienceCards = ExperienceCard::all();
        // Görünüme mevcut kayıt ve deneyim kartlarını gönderiyoruz.
        return view('admin.learned-from-experiences-card.create-edit', compact('learnedFromExperiencesCard', 'experienceCards'));
    }

    // Güncelleme işlemi
    public function update(Request $request, $id)
    {
        // Form doğrulama kuralları
        $validated = $request->validate([
            'experience_card_id' => 'required|exists:experience_cards,id',
            'sentence' => 'required|string|max:255',
            'section' => 'required|string|max:100',
            'work_tags' => 'nullable|string', // Girdi olarak bir dizi değil, string bekliyoruz
        ]);
    
        // work_tags alanını virgülle ayrılmış bir string'den bir diziye dönüştürme
        $validated['work_tags'] = $validated['work_tags'] ? explode(',', $validated['work_tags']) : [];
    
        // Mevcut kaydı güncelleme
        $learnedFromExperiencesCard = LearnedFromExperiencesCard::findOrFail($id);
        $learnedFromExperiencesCard->update($validated);
    
        return redirect()->route('learned-from-experiences-card.index')->with('success', 'Kayıt başarıyla güncellendi!');
    }

    // Silme işlemi
    public function destroy($id)
    {
        // Silinecek kaydı buluyoruz.
        $learnedFromExperiencesCard = LearnedFromExperiencesCard::findOrFail($id);
        // Kaydı siliyoruz.
        $learnedFromExperiencesCard->delete();

        // Başarı mesajıyla listeleme sayfasına yönlendirme.
        return redirect()->route('learned-from-experiences-card.index')->with('success', 'Kayıt başarıyla silindi!');
    }
}
