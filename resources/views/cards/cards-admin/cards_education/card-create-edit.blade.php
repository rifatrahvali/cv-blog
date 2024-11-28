<div class="card shadow-sm p-4" style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('education-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h2 class="text-center">{{ $educationCard ? 'Eğitim Düzenle' : 'Yeni Eğitim Ekle' }}</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        <form action="{{ $educationCard ? route('education-card.update', $educationCard->id) : route('education-card.store') }}" method="POST">
            @csrf
            @if ($educationCard)
                @method('PUT')
            @endif

            <!-- Eğitim Seviyesi -->
            <div class="mb-3">
                <label for="section" class="form-label"><strong>Eğitim Seviyesi:</strong></label>
                <input type="text" id="section" name="section" 
                       value="{{ old('section', $educationCard->section ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Şehir -->
            <div class="mb-3">
                <label for="city" class="form-label"><strong>Şehir:</strong></label>
                <input type="text" id="city" name="city" 
                       value="{{ old('city', $educationCard->city ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Okul Adı -->
            <div class="mb-3">
                <label for="school_name" class="form-label"><strong>Okul Adı:</strong></label>
                <input type="text" id="school_name" name="school_name" 
                       value="{{ old('school_name', $educationCard->school_name ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Bölüm -->
            <div class="mb-3">
                <label for="department" class="form-label"><strong>Bölüm:</strong></label>
                <input type="text" id="department" name="department" 
                       value="{{ old('department', $educationCard->department ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Başlangıç Yılı -->
            <div class="mb-3">
                <label for="start_year" class="form-label"><strong>Başlangıç Yılı:</strong></label>
                <input type="date" id="start_year" name="start_year" 
                       value="{{ old('start_year', $educationCard->start_year ?? '') }}" 
                       class="form-control" required>
            </div>

            <!-- Bitiş Yılı -->
            <div class="mb-3">
                <label for="end_year" class="form-label"><strong>Bitiş Yılı:</strong></label>
                <input type="date" id="end_year" name="end_year" 
                       value="{{ old('end_year', $educationCard->end_year ?? '') }}" 
                       class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $educationCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>