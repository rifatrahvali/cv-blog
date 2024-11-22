<h1>Profile Cards</h1>
<a href="{{ route('profile-card.create') }}">Yeni Ekle</a> | 
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
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Profil Resmi</th>
            <th>Ad</th>
            <th>Unvan</th>
            <th>Kullanıcı Adı</th>
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
                        Yok
                    @endif
                </td>
                <td>{{ $card->name }}</td>
                <td>{{ $card->title }}</td>
                <td>{{ $card->username }}</td>
                <td>{{ $card->github_link }}</td>
                <td>{{ $card->instagram_link }}</td>
                <td>{{ $card->youtube_link }}</td>
                <td>{{ $card->x_link }}</td>
                <td>{{ $card->linkedin_link }}</td>
                <td>
                    <a href="{{ route('profile-card.edit', $card->id) }}">Düzenle</a>
                    <form action="{{ route('profile-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>