<h1>Eğitim Kartları</h1> {{-- Sayfa başlığı. --}}


{{-- Yeni kayıt ekleme bağlantısı --}}
<a href="{{ route('education-card.create') }}">Yeni Eğitim Ekle</a> | 
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

{{-- Başarı mesajı gösterimi --}}
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

{{-- Eğitim kartlarını listeleyen tablo --}}
<table>
    <thead>
        <tr>
            <th>ID</th> {{-- Kayıt ID'si --}}
            <th>Eğitim Seviyesi</th> {{-- Eğitim derecesi --}}
            <th>Şehir</th> {{-- Şehir adı --}}
            <th>Okul Adı</th> {{-- Okul adı --}}
            <th>Bölüm</th> {{-- Bölüm adı --}}
            <th>Başlangıç Yılı</th> {{-- Başlangıç yılı --}}
            <th>Bitiş Yılı</th> {{-- Bitiş yılı --}}
            <th>İşlem</th> {{-- İşlem sütunu --}}
        </tr>
    </thead>
    <tbody>
        {{-- Eğitim kartlarını döngüyle listeleme --}}
        @foreach ($educationCards as $card)
            <tr>
                <td>{{ $card->id }}</td> {{-- Kayıt ID'si --}}
                <td>{{ $card->section }}</td> {{-- Eğitim seviyesi --}}
                <td>{{ $card->city }}</td> {{-- Şehir adı --}}
                <td>{{ $card->school_name }}</td> {{-- Okul adı --}}
                <td>{{ $card->department }}</td> {{-- Bölüm adı --}}
                <td>{{ $card->start_year }}</td> {{-- Başlangıç yılı --}}
                {{-- Eğer bitiş yılı varsa göster, yoksa "Devam Ediyor" yazdır --}}
                <td>{{ $card->end_year ? $card->end_year : 'Devam Ediyor' }}</td> 
                <td>
                    {{-- Düzenleme bağlantısı --}}
                    <a href="{{ route('education-card.edit', $card->id) }}">Düzenle</a>
                    {{-- Silme işlemi için form --}}
                    <form action="{{ route('education-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                        @csrf {{-- CSRF koruması --}}
                        @method('DELETE') {{-- HTTP DELETE metodu --}}
                        <button type="submit">Sil</button> {{-- Silme butonu --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>