@extends('layouts.errors')

@section('title', '403 - Yetkisiz Erişim')

@section('content')
<div class="text-center">

    <!-- Hata Başlığı -->
    <h1 class="display-4 mt-4">403 - Yetkisiz Erişim</h1>

    <!-- Hata Mesajı -->
    <p class="text-muted mb-4">
        Bu sayfaya erişim izniniz bulunmamaktadır.
    </p>

    <!-- Geri Dön Butonu -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary">
        Geri Dön
    </a>
</div>
@endsection