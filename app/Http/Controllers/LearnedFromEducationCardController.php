<?php

namespace App\Http\Controllers;

use App\Models\LearnedFromEducationCard; // Modeli dahil ediyoruz.
use App\Models\EducationCard; // İlişkili EducationCard modeli için dahil ediliyor.
use Illuminate\Http\Request; // HTTP isteklerini işlemek için kullanılır.

class LearnedFromEducationCardController extends Controller
{
    // Listeleme işlemi
    public function index()
    {
        $learnedFromEducationCards = LearnedFromEducationCard::with('education')->get(); // Tüm kayıtları ilişkileriyle getir.
        return view('pages.pages-admin.pages_learned-from-education-card.index', compact('learnedFromEducationCards')); // Görünümü yükle.
    }

    // Yeni kayıt ekleme formunu gösterme
    public function create()
    {
        $educationCards = EducationCard::all(); // Eğitim kartlarını dropdown için alıyoruz.
        return view('pages.pages-admin.pages_learned-from-education-card.create-edit', [
            'learnedFromEducationCard' => null, // Boş model.
            'educationCards' => $educationCards // Eğitim kartları.
        ]);
    }

    // Yeni kayıt ekleme işlemi
    public function store(Request $request)
    {
        // Form doğrulama kuralları
        $validated = $request->validate([
            'education_card_id' => 'required|exists:education_cards,id', // Geçerli bir education_card ID olmalı
            'degree' => 'required|string|max:255', // Derece zorunlu
            'main_achievement' => 'required|string|max:255', // Ana kazanım zorunlu
            'secondary_achievements' => 'nullable|string', // Yan kazanımlar opsiyonel, string olarak geliyor
        ]);
    
        // secondary_achievements string olarak geliyor, bunu diziye dönüştürelim
        $validated['secondary_achievements'] = $validated['secondary_achievements']
            ? explode(',', $validated['secondary_achievements']) // Virgülle ayrılmış stringi diziye dönüştür
            : null; // Eğer boşsa null olarak ayarla
    
        // Yeni kayıt oluştur
        LearnedFromEducationCard::create($validated);
    
        // Başarı mesajı ile yönlendir
        return redirect()->route('learned-from-education-card.index')->with('success', 'Kayıt başarıyla eklendi!');
    }

    // Düzenleme formunu gösterme
    public function edit($id)
    {
        $learnedFromEducationCard = LearnedFromEducationCard::findOrFail($id); // Düzenlenecek kaydı bul.
        $educationCards = EducationCard::all(); // Eğitim kartlarını dropdown için al.
        return view('pages.pages-admin.pages_learned-from-education-card.create-edit', compact('learnedFromEducationCard', 'educationCards'));
    }

    // Mevcut kaydı güncelleme işlemi
    public function update(Request $request, $id)
    {
        // Form doğrulama kuralları
        $validated = $request->validate([
            'education_card_id' => 'required|exists:education_cards,id', // Geçerli bir education_card ID olmalı
            'degree' => 'required|string|max:255', // Derece zorunlu
            'main_achievement' => 'required|string|max:255', // Ana kazanım zorunlu
            'secondary_achievements' => 'nullable|string', // Yan kazanımlar opsiyonel, string olarak geliyor
        ]);
    
        // secondary_achievements string olarak geliyor, bunu diziye dönüştürelim
        $validated['secondary_achievements'] = $validated['secondary_achievements']
            ? explode(',', $validated['secondary_achievements']) // Virgülle ayrılmış stringi diziye dönüştür
            : null; // Eğer boşsa null olarak ayarla
    
        // Mevcut kaydı güncelle
        $learnedFromEducationCard = LearnedFromEducationCard::findOrFail($id);
        $learnedFromEducationCard->update($validated);
    
        // Başarı mesajı ile yönlendir
        return redirect()->route('learned-from-education-card.index')->with('success', 'Kayıt başarıyla güncellendi!');
    }

    // Silme işlemi
    public function destroy($id)
    {
        $learnedFromEducationCard = LearnedFromEducationCard::findOrFail($id); // Silinecek kaydı bul.
        $learnedFromEducationCard->delete(); // Kaydı sil.

        return redirect()->route('learned-from-education-card.index')->with('success', 'Kayıt başarıyla silindi!');
    }
}