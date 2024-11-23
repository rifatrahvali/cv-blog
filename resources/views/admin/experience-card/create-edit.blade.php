@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4" style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('experience-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h2 class="text-center mb-4">{{ $experienceCard ? 'Deneyim Kartı Düzenle' : 'Deneyim Kartı Ekle' }}</h2>
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

        <form action="{{ $experienceCard ? route('experience-card.update', $experienceCard->id) : route('experience-card.store') }}" method="POST">
            @csrf
            @if ($experienceCard)
                @method('PUT')
            @endif

            <!-- Şirket Adı -->
            <div class="mb-3">
                <label for="company_name" class="form-label"><strong>Şirket Adı:</strong></label>
                <input type="text" id="company_name" name="company_name" 
                       value="{{ old('company_name', $experienceCard->company_name ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Başlangıç Tarihi -->
            <div class="mb-3">
                <label for="start_date" class="form-label"><strong>Başlangıç Tarihi:</strong></label>
                <input type="date" id="start_date" name="start_date" 
                       value="{{ old('start_date', $experienceCard->start_date ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Bitiş Tarihi -->
            <div class="mb-3">
                <label for="end_date" class="form-label"><strong>Bitiş Tarihi:</strong></label>
                <input type="date" id="end_date" name="end_date" 
                       value="{{ old('end_date', $experienceCard->end_date ?? '') }}" 
                       class="form-control">
            </div>

            <!-- Departman -->
            <div class="mb-3">
                <label for="department" class="form-label"><strong>Departman:</strong></label>
                <input type="text" id="department" name="department" 
                       value="{{ old('department', $experienceCard->department ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Unvan -->
            <div class="mb-3">
                <label for="title" class="form-label"><strong>Unvan:</strong></label>
                <input type="text" id="title" name="title" 
                       value="{{ old('title', $experienceCard->title ?? '') }}" 
                       class="form-control" required>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $experienceCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection