<?php
namespace App\Http\Controllers; // Laravel'in kontrolcüleri için kullanılan namespace.

use App\Models\ExperienceCard; // ExperienceCard modelini kullanıyoruz.
use Illuminate\Http\Request; // HTTP isteklerini işlemek için gerekli sınıf.

class ExperienceCardController extends Controller
{
    // Listeleme metodu: Tüm deneyim kartlarını listeler.
    public function index()
    {
        $experienceCards = ExperienceCard::all(); // Tüm deneyim kartlarını alıyoruz.
        return view('admin.experience-card.index', compact('experienceCards')); // Listeleme görünümüne verileri gönderiyoruz.
    }

    // Yeni deneyim kartı ekleme formu gösterimi.
    public function create()
    {
        return view('admin.experience-card.create-edit', ['experienceCard' => null]); // Boş bir form için görünüm döndürülüyor.
    }

    // Yeni deneyim kartı kaydetme işlemi.
    public function store(Request $request)
    {
        // Form doğrulama kuralları.
        $validated = $request->validate([
            'company_name' => 'required|string|max:255', // Şirket adı zorunlu ve 255 karakterden uzun olamaz.
            'start_date' => 'required|date', // Başlangıç tarihi zorunlu ve geçerli bir tarih olmalı.
            'end_date' => 'nullable|date|after_or_equal:start_date', // Bitiş tarihi opsiyonel ve başlangıç tarihinden sonra olmalı.
            'department' => 'required|string|max:255', // Departman adı zorunlu.
            'title' => 'required|string|max:255', // Unvan adı zorunlu.
        ]);

        ExperienceCard::create($validated); // Doğrulanan verilerle yeni deneyim kartı oluşturuluyor.

        // Başarı mesajıyla listeleme sayfasına yönlendirme.
        return redirect()->route('experience-card.index')->with('success', 'Deneyim Kartı başarıyla eklendi!');
    }

    // Mevcut deneyim kartı düzenleme formu gösterimi.
    public function edit($id)
    {
        $experienceCard = ExperienceCard::findOrFail($id); // ID'ye göre deneyim kartını buluyoruz.
        // Düzenleme görünümüne deneyim kartını gönderiyoruz.
        return view('admin.experience-card.create-edit', compact('experienceCard'));
    }

    // Mevcut deneyim kartını güncelleme işlemi.
    public function update(Request $request, $id)
    {
        // Form doğrulama kuralları.
        $validated = $request->validate([
            'company_name' => 'required|string|max:255', // Şirket adı zorunlu.
            'start_date' => 'required|date', // Başlangıç tarihi zorunlu.
            'end_date' => 'nullable|date|after_or_equal:start_date', // Bitiş tarihi opsiyonel.
            'department' => 'required|string|max:255', // Departman adı zorunlu.
            'title' => 'required|string|max:255', // Unvan adı zorunlu.
        ]);

        $experienceCard = ExperienceCard::findOrFail($id); // ID'ye göre deneyim kartını buluyoruz.
        $experienceCard->update($validated); // Kart verilerini güncelliyoruz.

        // Başarı mesajıyla listeleme sayfasına yönlendirme.
        return redirect()->route('experience-card.index')->with('success', 'Deneyim Kartı başarıyla güncellendi!');
    }

    // Mevcut deneyim kartını silme işlemi.
    public function destroy($id)
    {
        $experienceCard = ExperienceCard::findOrFail($id); // ID'ye göre deneyim kartını buluyoruz.
        $experienceCard->delete(); // Kartı siliyoruz.
        // Başarı mesajıyla listeleme sayfasına yönlendirme.
        return redirect()->route('experience-card.index')->with('success', 'Deneyim Kartı başarıyla silindi!');
    }
}