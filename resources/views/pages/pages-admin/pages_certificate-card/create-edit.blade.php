@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4" style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('certificate-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h2 class="text-center">{{ $certificateCard ? 'Sertifika Düzenle' : 'Yeni Sertifika Ekle' }}</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        <form action="{{ $certificateCard ? route('certificate-card.update', $certificateCard->id) : route('certificate-card.store') }}" method="POST">
            @csrf
            @if ($certificateCard)
                @method('PUT')
            @endif

            <!-- Sertifika Adı -->
            <div class="mb-3">
                <label for="certificate_name" class="form-label"><strong>Sertifika Adı:</strong></label>
                <input type="text" id="certificate_name" name="certificate_name" 
                       value="{{ old('certificate_name', $certificateCard->certificate_name ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Kurum -->
            <div class="mb-3">
                <label for="institution" class="form-label"><strong>Kurum:</strong></label>
                <input type="text" id="institution" name="institution" 
                       value="{{ old('institution', $certificateCard->institution ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Alan -->
            <div class="mb-3">
                <label for="field" class="form-label"><strong>Alan:</strong></label>
                <input type="text" id="field" name="field" 
                       value="{{ old('field', $certificateCard->field ?? '') }}" 
                       class="form-control" required>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $certificateCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection