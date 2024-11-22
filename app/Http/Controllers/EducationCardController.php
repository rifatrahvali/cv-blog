<?php

namespace App\Http\Controllers;

use App\Models\EducationCard; // Modeli dahil ediyoruz.
use Illuminate\Http\Request; // HTTP isteklerini işlemek için kullanılıyor.

class EducationCardController extends Controller
{
    // Tüm eğitim kartlarını listelemek için kullanılan metod.
    public function index()
    {
        $educationCards = EducationCard::all(); // Tüm kayıtları alıyoruz.
        return view('admin.education-card.index', compact('educationCards')); // Verileri görünüme aktarıyoruz.
    }

    // Yeni kayıt ekleme formunu göstermek için kullanılan metod.
    public function create()
    {
        return view('admin.education-card.create-edit', ['educationCard' => null]); // Boş bir modelle formu gönderiyoruz.
    }

    // Yeni bir eğitim kartı kaydı oluşturmak için kullanılan metod.
    public function store(Request $request)
    {
        // Form doğrulama kuralları.
        $validated = $request->validate([
            'section' => 'required|string|max:255', // Eğitim seviyesi zorunlu (Lisans, Yüksek Lisans gibi).
            'city' => 'required|string|max:255', // Şehir adı zorunlu ve 255 karakteri geçmemeli.
            'school_name' => 'required|string|max:255', // Okul adı zorunlu.
            'department' => 'required|string|max:255', // Bölüm adı zorunlu.
            'start_year' => 'required|date', // Başlangıç yılı zorunlu ve tarih formatında olmalı.
            'end_year' => 'nullable|date|after_or_equal:start_year', // Bitiş yılı opsiyonel ve başlangıç yılından sonra olmalı.
        ]);

        EducationCard::create($validated); // Veritabanına yeni kayıt ekliyoruz.

        return redirect()->route('education-card.index')->with('success', 'Eğitim başarıyla eklendi!'); // Başarı mesajıyla yönlendirme.
    }

    // Mevcut kaydı düzenleme formunu göstermek için kullanılan metod.
    public function edit($id)
    {
        $educationCard = EducationCard::findOrFail($id); // ID ile kaydı buluyoruz.
        return view('admin.education-card.create-edit', compact('educationCard')); // Doldurulmuş model ile formu gönderiyoruz.
    }

    // Mevcut bir eğitim kartı kaydını güncellemek için kullanılan metod.
    public function update(Request $request, $id)
    {
        // Form doğrulama kuralları.
        $validated = $request->validate([
            'section' => 'required|string|max:255', // Eğitim seviyesi zorunlu.
            'city' => 'required|string|max:255', // Şehir adı zorunlu.
            'school_name' => 'required|string|max:255', // Okul adı zorunlu.
            'department' => 'required|string|max:255', // Bölüm adı zorunlu.
            'start_year' => 'required|date', // Başlangıç yılı zorunlu.
            'end_year' => 'nullable|date|after_or_equal:start_year', // Bitiş yılı opsiyonel.
        ]);

        $educationCard = EducationCard::findOrFail($id); // Mevcut kaydı buluyoruz.
        $educationCard->update($validated); // Kaydı güncelliyoruz.

        return redirect()->route('education-card.index')->with('success', 'Eğitim başarıyla güncellendi!'); // Başarı mesajıyla yönlendirme.
    }

    // Mevcut bir eğitim kartı kaydını silmek için kullanılan metod.
    public function destroy($id)
    {
        $educationCard = EducationCard::findOrFail($id); // Kaydı buluyoruz.
        $educationCard->delete(); // Kaydı siliyoruz.

        return redirect()->route('education-card.index')->with('success', 'Eğitim başarıyla silindi!'); // Başarı mesajıyla yönlendirme.
    }
}