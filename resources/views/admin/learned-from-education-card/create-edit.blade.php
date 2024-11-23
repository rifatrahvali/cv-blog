@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4" style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('learned-from-education-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h1 class="text-center mb-4">{{ $learnedFromEducationCard ? 'Kayıt Düzenle' : 'Yeni Kayıt Ekle' }}</h1>
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

        <form action="{{ $learnedFromEducationCard ? route('learned-from-education-card.update', $learnedFromEducationCard->id) : route('learned-from-education-card.store') }}" method="POST">
            @csrf
            @if ($learnedFromEducationCard)
                @method('PUT')
            @endif

            <!-- Okul -->
            <div class="mb-3">
                <label for="education_card_id" class="form-label"><strong>Okul:</strong></label>
                <select id="education_card_id" name="education_card_id" class="form-select" required>
                    @foreach ($educationCards as $education)
                        <option value="{{ $education->id }}" {{ old('education_card_id', $learnedFromEducationCard->education_card_id ?? '') == $education->id ? 'selected' : '' }}>
                            {{ $education->school_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Derece -->
            <div class="mb-3">
                <label for="degree" class="form-label"><strong>Derece:</strong></label>
                <input type="text" id="degree" name="degree" 
                       value="{{ old('degree', $learnedFromEducationCard->degree ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Ana Kazanım -->
            <div class="mb-3">
                <label for="main_achievement" class="form-label"><strong>Ana Kazanım:</strong></label>
                <input type="text" id="main_achievement" name="main_achievement" 
                       value="{{ old('main_achievement', $learnedFromEducationCard->main_achievement ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Yan Kazanımlar -->
            <div class="mb-3">
                <label for="secondary_achievements" class="form-label"><strong>Yan Kazanımlar (virgülle ayır):</strong></label>
                <input type="text" id="secondary_achievements" name="secondary_achievements" 
                       value="{{ old('secondary_achievements', isset($learnedFromEducationCard->secondary_achievements) ? implode(',', $learnedFromEducationCard->secondary_achievements) : '') }}" 
                       class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $learnedFromEducationCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection