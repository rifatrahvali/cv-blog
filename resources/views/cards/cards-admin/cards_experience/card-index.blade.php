<div class="container table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('experience-card.create') }}" class="btn btn-primary">Yeni Ekle</a>
            <h2 class="text-center">Experience Cards</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>


        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Şirket Adı</th>
                    <th>Başlangıç Tarihi</th>
                    <th>Bitiş Tarihi</th>
                    <th>Departman</th>
                    <th>Unvan</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experienceCards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->company_name }}</td>
                        <td>{{ $card->start_date }}</td>
                        <td>{{ $card->end_date ?? 'Devam Ediyor' }}</td>
                        <td>{{ $card->department }}</td>
                        <td>{{ $card->title }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('experience-card.edit', $card->id) }}"
                                class="btn btn-sm btn-warning me-2">Düzenle</a>
                            <form action="{{ route('experience-card.destroy', $card->id) }}" method="POST"
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