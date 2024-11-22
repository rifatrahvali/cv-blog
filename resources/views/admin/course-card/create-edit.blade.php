<h1>{{ $courseCard ? 'Kurs Düzenle' : 'Yeni Kurs Ekle' }}</h1> | 
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

@if ($errors->any()) <!-- Hata mesajlarını göster -->
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $courseCard ? route('course-card.update', $courseCard->id) : route('course-card.store') }}" method="POST">
    @csrf <!-- CSRF koruması -->
    @if ($courseCard)
        @method('PUT') <!-- Güncelleme işlemi için PUT metodu -->
    @endif

    <div>
        <label for="course_name">Kurs Adı:</label>
        <input type="text" id="course_name" name="course_name" value="{{ old('course_name', $courseCard->course_name ?? '') }}" required>
    </div>

    <div>
        <label for="institution">Kurum:</label>
        <input type="text" id="institution" name="institution" value="{{ old('institution', $courseCard->institution ?? '') }}" required>
    </div>

    <div>
        <label for="additional_achievements">Yan Kazanımlar (virgülle ayrılmış):</label>
        <input type="text" id="additional_achievements" name="additional_achievements"
               value="{{ old('additional_achievements', isset($courseCard) && $courseCard->additional_achievements ? implode(', ', $courseCard->additional_achievements) : '') }}">
    </div>

    <button type="submit">{{ $courseCard ? 'Güncelle' : 'Kaydet' }}</button> <!-- Gönder butonu -->
</form>