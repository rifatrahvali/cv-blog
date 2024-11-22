<?php

namespace App\Http\Controllers;

use App\Models\CertificateCard; // Modeli dahil ediyoruz
use Illuminate\Http\Request; // HTTP isteklerini işlemek için kullanılır

class CertificateCardController extends Controller
{
    // Listeleme işlemi
    public function index()
    {
        $certificateCards = CertificateCard::all(); // Tüm kayıtları alıyoruz
        return view('admin.certificate-card.index', compact('certificateCards')); // Kayıtları görünüme gönderiyoruz
    }

    // Yeni kayıt ekleme formu
    public function create()
    {
        return view('admin.certificate-card.create-edit', ['certificateCard' => null]); // Boş bir modelle formu gönderiyoruz
    }

    // Yeni kayıt ekleme işlemi
    public function store(Request $request)
    {
        // Form doğrulama kuralları
        $validated = $request->validate([
            'certificate_name' => 'required|string|max:255', // Sertifika adı zorunlu
            'institution' => 'required|string|max:255', // Kurum adı zorunlu
            'field' => 'required|string|max:255', // Sertifika alanı zorunlu
        ]);

        CertificateCard::create($validated); // Yeni kayıt oluştur
        return redirect()->route('certificate-card.index')->with('success', 'Sertifika başarıyla eklendi!'); // Başarı mesajı ile yönlendir
    }

    // Düzenleme formunu gösterme
    public function edit($id)
    {
        $certificateCard = CertificateCard::findOrFail($id); // Mevcut kaydı buluyoruz
        return view('admin.certificate-card.create-edit', compact('certificateCard')); // Formu doldurulmuş modelle gönderiyoruz
    }

    // Mevcut kaydı güncelleme işlemi
    public function update(Request $request, $id)
    {
        // Form doğrulama kuralları
        $validated = $request->validate([
            'certificate_name' => 'required|string|max:255', // Sertifika adı zorunlu
            'institution' => 'required|string|max:255', // Kurum adı zorunlu
            'field' => 'required|string|max:255', // Sertifika alanı zorunlu
        ]);

        $certificateCard = CertificateCard::findOrFail($id); // Mevcut kaydı buluyoruz
        $certificateCard->update($validated); // Kaydı güncelliyoruz
        return redirect()->route('certificate-card.index')->with('success', 'Sertifika başarıyla güncellendi!'); // Başarı mesajı ile yönlendir
    }

    // Silme işlemi
    public function destroy($id)
    {
        $certificateCard = CertificateCard::findOrFail($id); // Mevcut kaydı buluyoruz
        $certificateCard->delete(); // Kaydı siliyoruz
        return redirect()->route('certificate-card.index')->with('success', 'Sertifika başarıyla silindi!'); // Başarı mesajı ile yönlendir
    }
}