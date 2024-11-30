@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Destek Talebi Detayı</h1>

    <div class="card">
        <div class="card-header">
            <h4>{{ $supportRequest->first_name }} {{ $supportRequest->last_name }} - Destek Talebi</h4>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $supportRequest->email }}</p>
            <p><strong>Telefon:</strong> {{ $supportRequest->phone }}</p>
            <p><strong>Bütçe:</strong> {{ $supportRequest->budget }}</p>
            <hr>
            <h5>Proje Bilgileri</h5>
            <p><strong>Proje Açıklaması:</strong> {{ $supportRequest->project_description }}</p>
            <p><strong>Logo Durumu:</strong> {{ $supportRequest->has_logo === 'yes' ? 'Evet' : 'Hayır' }}</p>
            <p><strong>Sayfa Sayısı:</strong> {{ $supportRequest->page_count }}</p>
            <p><strong>Web Sayfası Türü:</strong> {{ $supportRequest->website_type ?? 'Belirtilmedi' }}</p>
            <p><strong>Web Sayfasının Hazır Olması Gereken Tarih:</strong> {{ $supportRequest->deadline }}</p>
            <hr>
            <h5>Diğer Bilgiler</h5>
            <p><strong>Hosting Durumu:</strong> {{ $supportRequest->has_hosting ?? 'Belirtilmedi' }}</p>
            <p><strong>Mevcut İçerik Kullanımı:</strong> {{ $supportRequest->use_existing_content ?? 'Belirtilmedi' }}</p>
            <p><strong>Hedef Kitle:</strong> {{ $supportRequest->target_audience }}</p>
            <p><strong>Renk Tercihleri:</strong> {{ $supportRequest->color_preferences ?? 'Belirtilmedi' }}</p>
            <p><strong>Rakip Web Siteleri:</strong> {{ $supportRequest->competitor_websites ?? 'Belirtilmedi' }}</p>
            <p><strong>Beğendiğiniz Web Siteleri:</strong> {{ $supportRequest->liked_websites ?? 'Belirtilmedi' }}</p>
            <p><strong>Ek Yorum:</strong> {{ $supportRequest->additional_comments ?? 'Belirtilmedi' }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.support-forms.index') }}" class="btn btn-secondary">Geri Dön</a>
        </div>
    </div>
</div>
@endsection