<h1>{{ $aboutCard ? 'Hakkımda Kartı Düzenle' : 'Hakkımda Kartı Ekle' }}</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $aboutCard ? route('about-card.update', $aboutCard->id) : route('about-card.store') }}" method="POST">
    @csrf
    @if ($aboutCard)
        @method('PUT')
    @endif

    <div>
        <label for="description">Açıklama:</label>
        <textarea id="description" name="description" rows="5"
            required>{{ old('description', $aboutCard->description ?? '') }}</textarea>
    </div>

    <button type="submit">{{ $aboutCard ? 'Güncelle' : 'Kaydet' }}</button>
</form>