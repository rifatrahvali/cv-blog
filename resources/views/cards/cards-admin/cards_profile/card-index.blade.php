<div class="container table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('profile-card.create') }}" class="btn btn-primary">Yeni Ekle</a>
            <h2 class="text-center">Profile Cards</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Profil Resmi</th>
                    <th>Ad</th>
                    <th>Unvan</th>
                    <th>Kullanıcı Adı</th>
                    <th>Email</th>
                    <th>GitHub</th>
                    <th>Instagram</th>
                    <th>YouTube</th>
                    <th>X</th>
                    <th>LinkedIn</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profileCards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>
                            @if($card->profile_image)
                                <img src="{{ asset('storage/' . $card->profile_image) }}" alt="Profil Resmi"
                                    style="width: 50px; height: 50px;">
                            @else
                                <span class="text-muted">Yok</span>
                            @endif
                        </td>
                        <td>{{ $card->name }}</td>
                        <td>{{ $card->title }}</td>
                        <td>{{ $card->username }}</td>
                        <td><a href="mailto:{{ $card->email }}" target="_blank">E-Mail</a></td>
                        <td><a href="{{ $card->github_link }}" target="_blank">GitHub</a></td>
                        <td><a href="{{ $card->instagram_link }}" target="_blank">Instagram</a></td>
                        <td><a href="{{ $card->youtube_link }}" target="_blank">YouTube</a></td>
                        <td><a href="{{ $card->x_link }}" target="_blank">X</a></td>
                        <td><a href="{{ $card->linkedin_link }}" target="_blank">LinkedIn</a></td>
                        <td class="action-buttons">
                            <a href="{{ route('profile-card.edit', $card->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                            <form action="{{ route('profile-card.destroy', $card->id) }}" method="POST"
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