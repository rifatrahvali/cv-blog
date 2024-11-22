{{-- Sayfa başlığı. --}}
<h1>{{ $learnedFromExperiencesCard ? 'Kayıt Düzenle' : 'Yeni Kayıt Ekle' }}</h1>
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

@if ($errors->any()) {{-- Hata mesajlarını göster. --}}
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ $learnedFromExperiencesCard ? route('learned-from-experiences-card.update', $learnedFromExperiencesCard->id) : route('learned-from-experiences-card.store') }}"
    method="POST">
    @csrf {{-- CSRF koruması --}}
    @if ($learnedFromExperiencesCard)
        @method('PUT') {{-- Güncelleme işlemi için PUT metodu. --}}
    @endif

    <div>
        <label for="experience_card_id">Şirket:</label>
        <select id="experience_card_id" name="experience_card_id" required> {{-- Şirket dropdown. --}}
            @foreach ($experienceCards as $experience)
                <option value="{{ $experience->id }}" {{ old('experience_card_id', $learnedFromExperiencesCard->experience_card_id ?? '') == $experience->id ? 'selected' : '' }}>
                    {{ $experience->company_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="sentence">Açıklama:</label>
        <input type="text" id="sentence" name="sentence"
            value="{{ old('sentence', $learnedFromExperiencesCard->sentence ?? '') }}" required>
    </div>

    <div>
        <label for="section">Bölüm:</label>
        <input type="text" id="section" name="section"
            value="{{ old('section', $learnedFromExperiencesCard->section ?? '') }}" required>
    </div>


    <label for="work_tags">Etiketler (virgülle ayır):</label>
    <input type="text" id="work_tags" name="work_tags"
        value="{{ old('work_tags', is_array($learnedFromExperiencesCard->work_tags ?? null) ? implode(',', $learnedFromExperiencesCard->work_tags) : '') }}">

    <button type="submit">{{ $learnedFromExperiencesCard ? 'Güncelle' : 'Kaydet' }}</button> {{-- Gönder butonu --}}
</form>