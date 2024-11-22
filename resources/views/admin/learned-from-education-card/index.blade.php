<h1>Eğitimden Öğrenilenler</h1>
<a href="{{ route('learned-from-education-card.create') }}">Yeni Ekle</a> | 
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Okul</th>
            <th>Derece</th>
            <th>Ana Kazanım</th>
            <th>Yan Kazanımlar</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($learnedFromEducationCards as $card)
            <tr>
                <td>{{ $card->id }}</td>
                <td>{{ $card->education->school_name }}</td>
                <td>{{ $card->degree }}</td>
                <td>{{ $card->main_achievement }}</td>
                <td>{{ implode(', ', $card->secondary_achievements ?? []) }}</td>
                <td>
                    <a href="{{ route('learned-from-education-card.edit', $card->id) }}">Düzenle</a>
                    <form action="{{ route('learned-from-education-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>