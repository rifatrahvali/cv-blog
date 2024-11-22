<h1>Learned From Experiences Cards</h1> {{-- Sayfa başlığı. --}}
{{-- Yeni kayıt ekleme bağlantısı. --}}
<a href="{{ route('learned-from-experiences-card.create') }}">Yeni Ekle</a> |
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

@if (session('success')) {{-- Başarı mesajını göster. --}}
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th> {{-- Kayıt ID'si --}}
            <th>Şirket</th> {{-- Şirket adı --}}
            <th>Açıklama</th> {{-- Öğrenim açıklaması --}}
            <th>Bölüm</th> {{-- Bölüm adı --}}
            <th>Etiketler</th> {{-- İş etiketleri --}}
            <th>İşlem</th> {{-- İşlemler (düzenle/sil) --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($learnedFromExperiencesCards as $card) {{-- Tüm kayıtları döngüyle listele. --}}
            <tr>
                <td>{{ $card->id }}</td> {{-- Kayıt ID'si --}}
                <td>{{ $card->experience->company_name }}</td> {{-- İlgili deneyim kartının şirket adı --}}
                <td>{{ $card->sentence }}</td> {{-- Öğrenim açıklaması --}}
                <td>{{ $card->section }}</td> {{-- Bölüm adı --}}
                {{-- work_tags alanı bir dizi ise implode ile göster, değilse 'Yok' yaz --}}{{-- İş etiketlerini göster --}}
                <td>{{ is_array($card->work_tags) ? implode(', ', $card->work_tags) : 'Yok' }}</td>
                <td>
                    <a href="{{ route('learned-from-experiences-card.edit', $card->id) }}">Düzenle</a> {{-- Düzenleme
                    bağlantısı --}}
                    <form action="{{ route('learned-from-experiences-card.destroy', $card->id) }}" method="POST"
                        style="display:inline;">
                        @csrf {{-- CSRF koruması --}}
                        @method('DELETE') {{-- HTTP DELETE yöntemi --}}
                        <button type="submit">Sil</button> {{-- Silme butonu --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>