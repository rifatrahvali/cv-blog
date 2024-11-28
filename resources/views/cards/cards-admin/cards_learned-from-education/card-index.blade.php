<div class="container table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('learned-from-education-card.create') }}" class="btn btn-primary">Yeni Ekle</a>
            <h2 class="text-center">Learned From Education Cards</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                        <td>{{ implode(', ', $card->secondary_achievements ?? ['Kazanım yok']) }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('learned-from-education-card.edit', $card->id) }}"
                                class="btn btn-sm btn-warning me-2">Düzenle</a>
                            <form action="{{ route('learned-from-education-card.destroy', $card->id) }}" method="POST"
                                style="display:inline;">
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