<h1>Experience Cards</h1> {{-- Sayfa başlığı. --}}
{{-- Yeni deneyim kartı ekleme bağlantısı. --}}
<a href="{{ route('experience-card.create') }}">Yeni Ekle</a> | 
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>


@if (session('success')) {{-- Başarı mesajını göster. --}}
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th> {{-- Kart ID'si --}}
            <th>Şirket Adı</th> {{-- Şirket adı --}}
            <th>Başlangıç Tarihi</th> {{-- Başlangıç tarihi --}}
            <th>Bitiş Tarihi</th> {{-- Bitiş tarihi --}}
            <th>Departman</th> {{-- Departman --}}
            <th>Unvan</th> {{-- Unvan --}}
            <th>İşlem</th> {{-- İşlemler (düzenle/sil) --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($experienceCards as $card) {{-- Tüm deneyim kartlarını döngüyle listele. --}}
            <tr>
                <td>{{ $card->id }}</td> {{-- Kart ID'si --}}
                <td>{{ $card->company_name }}</td> {{-- Şirket adı --}}
                <td>{{ $card->start_date }}</td> {{-- Başlangıç tarihi --}}
                <td>{{ $card->end_date ?? 'Devam Ediyor' }}</td> {{-- Bitiş tarihi ya da devam ediyor --}}
                <td>{{ $card->department }}</td> {{-- Departman --}}
                <td>{{ $card->title }}</td> {{-- Unvan --}}
                <td>
                    <a href="{{ route('experience-card.edit', $card->id) }}">Düzenle</a> {{-- Düzenleme bağlantısı --}}
                    <form action="{{ route('experience-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                        @csrf {{-- CSRF koruması --}}
                        @method('DELETE') {{-- HTTP DELETE yöntemi --}}
                        <button type="submit">Sil</button> {{-- Silme butonu --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>