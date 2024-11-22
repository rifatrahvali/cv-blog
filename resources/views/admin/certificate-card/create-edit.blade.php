<h1>{{ $certificateCard ? 'Sertifika Düzenle' : 'Yeni Sertifika Ekle' }}</h1> | 
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

<form action="{{ $certificateCard ? route('certificate-card.update', $certificateCard->id) : route('certificate-card.store') }}" method="POST">
    @csrf <!-- CSRF koruması -->
    @if ($certificateCard)
        @method('PUT') <!-- Güncelleme işlemi için PUT metodu -->
    @endif

    <div>
        <label for="certificate_name">Sertifika Adı:</label>
        <input type="text" id="certificate_name" name="certificate_name" value="{{ old('certificate_name', $certificateCard->certificate_name ?? '') }}" required>
    </div>

    <div>
        <label for="institution">Kurum:</label>
        <input type="text" id="institution" name="institution" value="{{ old('institution', $certificateCard->institution ?? '') }}" required>
    </div>

    <div>
        <label for="field">Alan:</label>
        <input type="text" id="field" name="field" value="{{ old('field', $certificateCard->field ?? '') }}" required>
    </div>

    <button type="submit">{{ $certificateCard ? 'Güncelle' : 'Kaydet' }}</button> <!-- Gönder butonu -->
</form>