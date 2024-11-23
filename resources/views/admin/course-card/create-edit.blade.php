@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4" style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('course-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h2 class="text-center mb-4">{{ $courseCard ? 'Kurs Düzenle' : 'Yeni Kurs Ekle' }}</h2>
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

        <form action="{{ $courseCard ? route('course-card.update', $courseCard->id) : route('course-card.store') }}" method="POST">
            @csrf
            @if ($courseCard)
                @method('PUT')
            @endif

            <!-- Kurs Adı -->
            <div class="mb-3">
                <label for="course_name" class="form-label"><strong>Kurs Adı:</strong></label>
                <input type="text" id="course_name" name="course_name" 
                       value="{{ old('course_name', $courseCard->course_name ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Kurum -->
            <div class="mb-3">
                <label for="institution" class="form-label"><strong>Kurum:</strong></label>
                <input type="text" id="institution" name="institution" 
                       value="{{ old('institution', $courseCard->institution ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Yan Kazanımlar -->
            <div class="mb-3">
                <label for="additional_achievements" class="form-label"><strong>Yan Kazanımlar (virgülle ayrılmış):</strong></label>
                <input type="text" id="additional_achievements" name="additional_achievements" 
                       value="{{ old('additional_achievements', isset($courseCard) && $courseCard->additional_achievements ? implode(', ', $courseCard->additional_achievements) : '') }}" 
                       class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $courseCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection