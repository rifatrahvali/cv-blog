<div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('about-card.create') }}" class="btn btn-primary">Yeni Ekle</a>
        <h2 class="text-center mb-4">About Cards</h2>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('about-card.edit', $card->id) }}" class="btn btn-sm btn-warning me-2">Düzenle</a>
                        <form action="{{ route('about-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>