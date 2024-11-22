<h1>Sertifikalar</h1> <!-- Sayfa başlığı -->
<a href="{{ route('certificate-card.create') }}">Yeni Ekle</a> | 
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

@if (session('success')) <!-- Başarı mesajını göster -->
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th> <!-- Kayıt ID'si -->
            <th>Sertifika Adı</th> <!-- Sertifika adı -->
            <th>Kurum</th> <!-- Sertifikayı veren kurum -->
            <th>Alan</th> <!-- Sertifikayla ilgili alan -->
            <th>İşlem</th> <!-- İşlemler (düzenle/sil) -->
        </tr>
    </thead>
    <tbody>
        @foreach ($certificateCards as $card) <!-- Tüm kayıtları döngüyle listele -->
            <tr>
                <td>{{ $card->id }}</td> <!-- Kayıt ID'si -->
                <td>{{ $card->certificate_name }}</td> <!-- Sertifika adı -->
                <td>{{ $card->institution }}</td> <!-- Sertifikayı veren kurum -->
                <td>{{ $card->field }}</td> <!-- Sertifikayla ilgili alan -->
                <td>
                    <a href="{{ route('certificate-card.edit', $card->id) }}">Düzenle</a> <!-- Düzenleme bağlantısı -->
                    <form action="{{ route('certificate-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                        @csrf <!-- CSRF koruması -->
                        @method('DELETE') <!-- HTTP DELETE yöntemi -->
                        <button type="submit">Sil</button> <!-- Silme butonu -->
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>