@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4" style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('learned-from-experiences-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h2 class="text-center mb-4">{{ $learnedFromExperiencesCard ? 'Kayıt Düzenle' : 'Yeni Kayıt Ekle' }}</h2>
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

        <form action="{{ $learnedFromExperiencesCard ? route('learned-from-experiences-card.update', $learnedFromExperiencesCard->id) : route('learned-from-experiences-card.store') }}" method="POST">
            @csrf
            @if ($learnedFromExperiencesCard)
                @method('PUT')
            @endif

            <!-- Şirket -->
            <div class="mb-3">
                <label for="experience_card_id" class="form-label"><strong>Şirket:</strong></label>
                <select id="experience_card_id" name="experience_card_id" class="form-select" required>
                    @foreach ($experienceCards as $experience)
                        <option value="{{ $experience->id }}" {{ old('experience_card_id', $learnedFromExperiencesCard->experience_card_id ?? '') == $experience->id ? 'selected' : '' }}>
                            {{ $experience->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Açıklama -->
            <div class="mb-3">
                <label for="sentence" class="form-label"><strong>Açıklama:</strong></label>
                <input type="text" id="sentence" name="sentence" 
                       value="{{ old('sentence', $learnedFromExperiencesCard->sentence ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Bölüm -->
            <div class="mb-3">
                <label for="section" class="form-label"><strong>Bölüm:</strong></label>
                <input type="text" id="section" name="section" 
                       value="{{ old('section', $learnedFromExperiencesCard->section ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Etiketler -->
            <div class="mb-3">
                <label for="work_tags" class="form-label"><strong>Etiketler (virgülle ayır):</strong></label>
                <input type="text" id="work_tags" name="work_tags" 
                       value="{{ old('work_tags', is_array($learnedFromExperiencesCard->work_tags ?? null) ? implode(',', $learnedFromExperiencesCard->work_tags) : '') }}" 
                       class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $learnedFromExperiencesCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection