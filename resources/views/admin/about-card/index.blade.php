<h1>About Cards</h1>
    <a href="{{ route('about-card.create') }}">Yeni Ekle</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Açıklama</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutCards as $card)
                <tr>
                    <td>{{ $card->id }}</td>
                    <td>{{ $card->description }}</td>
                    <td>
                        <a href="{{ route('about-card.edit', $card->id) }}">Düzenle</a>
                        <form action="{{ route('about-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>