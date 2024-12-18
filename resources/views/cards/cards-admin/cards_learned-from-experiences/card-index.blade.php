<div class="container table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('learned-from-experiences-card.create') }}" class="btn btn-primary">Yeni Ekle</a>
            <h2 class="text-center">Learned From Experiences Cards</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Şirket</th>
                    <th>Açıklama</th>
                    <th>Bölüm</th>
                    <th>Etiketler</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($learnedFromExperiencesCards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->experience->company_name }}</td>
                        <td>{{ $card->sentence }}</td>
                        <td>{{ $card->section }}</td>
                        <td>{{ is_array($card->work_tags) ? implode(', ', $card->work_tags) : 'Yok' }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('learned-from-experiences-card.edit', $card->id) }}"
                                class="btn btn-sm btn-warning me-2">Düzenle</a>
                            <form action="{{ route('learned-from-experiences-card.destroy', $card->id) }}" method="POST"
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