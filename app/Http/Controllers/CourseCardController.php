<?php

namespace App\Http\Controllers;

use App\Models\CourseCard; // Modeli dahil ediyoruz
use Illuminate\Http\Request; // HTTP isteklerini işlemek için kullanılır

class CourseCardController extends Controller
{
    // Listeleme işlemi
    public function index()
    {
        $courseCards = CourseCard::all(); // Tüm kayıtları alıyoruz
        return view('admin.course-card.index', compact('courseCards')); // Kayıtları görünüme gönderiyoruz
    }

    // Yeni kayıt ekleme formu
    public function create()
    {
        return view('admin.course-card.create-edit', ['courseCard' => null]); // Boş bir modelle formu gösteriyoruz
    }

    // Yeni kayıt ekleme işlemi
    public function store(Request $request)
    {
        // Form doğrulama kuralları
        $validated = $request->validate([
            'course_name' => 'required|string|max:255', // Kurs adı zorunlu
            'institution' => 'required|string|max:255', // Kurum adı zorunlu
            'additional_achievements' => 'nullable|string', // Yan kazanımlar opsiyonel, string olarak geliyor
        ]);

        // Yan kazanımları diziye dönüştürme
        $validated['additional_achievements'] = $validated['additional_achievements']
            ? explode(',', $validated['additional_achievements']) // Virgülle ayrılmış stringi diziye dönüştür
            : null; // Eğer boşsa null olarak ayarla

        CourseCard::create($validated); // Yeni kayıt oluştur
        return redirect()->route('course-card.index')->with('success', 'Kurs başarıyla eklendi!'); // Başarı mesajı ile yönlendir
    }

    // Düzenleme formunu gösterme
    public function edit($id)
    {
        $courseCard = CourseCard::findOrFail($id); // Mevcut kaydı buluyoruz
        return view('admin.course-card.create-edit', compact('courseCard')); // Formu doldurulmuş modelle gönderiyoruz
    }

    // Mevcut kaydı güncelleme işlemi
    public function update(Request $request, $id)
    {
        // Form doğrulama kuralları
        $validated = $request->validate([
            'course_name' => 'required|string|max:255', // Kurs adı zorunlu
            'institution' => 'required|string|max:255', // Kurum adı zorunlu
            'additional_achievements' => 'nullable|string', // Yan kazanımlar opsiyonel, string olarak geliyor
        ]);

        // Yan kazanımları diziye dönüştürme
        $validated['additional_achievements'] = $validated['additional_achievements']
            ? explode(',', $validated['additional_achievements']) // Virgülle ayrılmış stringi diziye dönüştür
            : null; // Eğer boşsa null olarak ayarla

        $courseCard = CourseCard::findOrFail($id); // Mevcut kaydı buluyoruz
        $courseCard->update($validated); // Kaydı güncelliyoruz
        return redirect()->route('course-card.index')->with('success', 'Kurs başarıyla güncellendi!'); // Başarı mesajı ile yönlendir
    }

    // Silme işlemi
    public function destroy($id)
    {
        $courseCard = CourseCard::findOrFail($id); // Mevcut kaydı buluyoruz
        $courseCard->delete(); // Kaydı siliyoruz
        return redirect()->route('course-card.index')->with('success', 'Kurs başarıyla silindi!'); // Başarı mesajı ile yönlendir
    }
}