<h1>{{ $educationCard ? 'Eğitim Düzenle' : 'Yeni Eğitim Ekle' }}</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $educationCard ? route('education-card.update', $educationCard->id) : route('education-card.store') }}" method="POST">
    @csrf
    @if ($educationCard)
        @method('PUT')
    @endif

    <div>
        <label for="section">Eğitim Seviyesi:</label>
        <input type="text" id="section" name="section" value="{{ old('section', $educationCard->section ?? '') }}" required>
    </div>

    <div>
        <label for="city">Şehir:</label>
        <input type="text" id="city" name="city" value="{{ old('city', $educationCard->city ?? '') }}" required>
    </div>

    <div>
        <label for="school_name">Okul Adı:</label>
        <input type="text" id="school_name" name="school_name" value="{{ old('school_name', $educationCard->school_name ?? '') }}" required>
    </div>

    <div>
        <label for="department">Bölüm:</label>
        <input type="text" id="department" name="department" value="{{ old('department', $educationCard->department ?? '') }}" required>
    </div>

    <div>
        <label for="start_year">Başlangıç Yılı:</label>
        <input type="date" id="start_year" name="start_year" value="{{ old('start_year', $educationCard->start_year ?? '') }}" required>
    </div>

    <div>
        <label for="end_year">Bitiş Yılı:</label>
        <input type="date" id="end_year" name="end_year" value="{{ old('end_year', $educationCard->end_year ?? '') }}">
    </div>

    <button type="submit">{{ $educationCard ? 'Güncelle' : 'Kaydet' }}</button>
</form>