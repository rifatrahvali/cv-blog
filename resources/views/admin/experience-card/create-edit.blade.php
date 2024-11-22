<h1>{{ $experienceCard ? 'Deneyim Kartı Düzenle' : 'Deneyim Kartı Ekle' }}</h1> {{-- Başlık. --}}

@if ($errors->any()) {{-- Form doğrulama hatalarını göster. --}}
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ $experienceCard ? route('experience-card.update', $experienceCard->id) : route('experience-card.store') }}"
    method="POST"> {{-- Form başlangıcı. --}}
    @csrf {{-- CSRF koruması --}}
    @if ($experienceCard)
        @method('PUT') {{-- Eğer düzenleme yapılıyorsa PUT metodu kullanılır. --}}
    @endif

    <div>
        <label for="company_name">Şirket Adı:</label>
        <input type="text" id="company_name" name="company_name"
            value="{{ old('company_name', $experienceCard->company_name ?? '') }}" required> {{-- Şirket adı. --}}
    </div>

    <div>
        <label for="start_date">Başlangıç Tarihi:</label>
        <input type="date" id="start_date" name="start_date"
            value="{{ old('start_date', $experienceCard->start_date ?? '') }}" required> {{-- Başlangıç tarihi. --}}
    </div>

    <div>
        <label for="end_date">Bitiş Tarihi:</label>
        <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $experienceCard->end_date ?? '') }}">
        {{-- Bitiş tarihi (opsiyonel). --}}
    </div>

    <div>
        <label for="department">Departman:</label>
        <input type="text" id="department" name="department"
            value="{{ old('department', $experienceCard->department ?? '') }}" required> {{-- Departman. --}}
    </div>

    <div>
        <label for="title">Unvan:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $experienceCard->title ?? '') }}" required>
        {{-- Unvan. --}}
    </div>

    <button type="submit">{{ $experienceCard ? 'Güncelle' : 'Kaydet' }}</button> {{-- Form gönderme butonu. --}}
</form>