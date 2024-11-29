@extends('layouts.errors') <!-- Hata layout'unu kullanıyoruz -->

@section('title', '404 - Sayfa Bulunamadı') <!-- Başlık kısmını özelleştiriyoruz -->

@section('content')
<div class="text-center">    
    <!-- Hata Başlığı -->
    <h1 class="display-4 mt-4">404 - Sayfa Bulunamadı</h1>

    <!-- Hata Mesajı -->
    <p class="text-muted mb-4">
        Üzgünüz, ulaşmaya çalıştığınız sayfa mevcut değil.
    </p>

    <!-- Ana Sayfa Butonu -->
    <a href="{{ route('cv.index') }}" class="btn btn-secondary">
        Ana Sayfaya Dön
    </a>
</div>
@endsection