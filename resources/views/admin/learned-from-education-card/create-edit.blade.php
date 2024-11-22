<h1>{{ $learnedFromEducationCard ? 'Düzenle' : 'Yeni Ekle' }}</h1> |
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ $learnedFromEducationCard ? route('learned-from-education-card.update', $learnedFromEducationCard->id) : route('learned-from-education-card.store') }}"
    method="POST">
    @csrf
    @if ($learnedFromEducationCard)
        @method('PUT')
    @endif

    <div>
        <label for="education_card_id">Okul:</label>
        <select id="education_card_id" name="education_card_id" required>
            @foreach ($educationCards as $education)
                <option value="{{ $education->id }}" {{ old('education_card_id', $learnedFromEducationCard->education_card_id ?? '') == $education->id ? 'selected' : '' }}>
                    {{ $education->school_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="degree">Derece:</label>
        <input type="text" id="degree" name="degree"
            value="{{ old('degree', $learnedFromEducationCard->degree ?? '') }}" required>
    </div>

    <div>
        <label for="main_achievement">Ana Kazanım:</label>
        <input type="text" id="main_achievement" name="main_achievement"
            value="{{ old('main_achievement', $learnedFromEducationCard->main_achievement ?? '') }}" required>
    </div>

    <div>
        <label for="secondary_achievements">Yan Kazanımlar (virgülle ayrılmış):</label>
        <input type="text" id="secondary_achievements" name="secondary_achievements"
            value="{{ old('secondary_achievements', isset($learnedFromEducationCard) && $learnedFromEducationCard->secondary_achievements ? implode(', ', $learnedFromEducationCard->secondary_achievements) : '') }}">
    </div>

    <button type="submit">{{ $learnedFromEducationCard ? 'Güncelle' : 'Kaydet' }}</button>
</form>