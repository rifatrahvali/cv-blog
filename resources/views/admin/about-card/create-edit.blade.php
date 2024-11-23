@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4" style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('about-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h2 class="text-center mb-4">{{ $aboutCard ? 'Hakkımda Kartı Düzenle' : 'Hakkımda Kartı Ekle' }}</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $aboutCard ? route('about-card.update', $aboutCard->id) : route('about-card.store') }}" method="POST">
            @csrf
            @if ($aboutCard)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="description" class="form-label"><strong>Açıklama:</strong></label>
                <textarea id="description" name="description" rows="5" class="form-control" required>{{ old('description', $aboutCard->description ?? '') }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $aboutCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection