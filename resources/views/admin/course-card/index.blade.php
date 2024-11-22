<h1>Kurslar</h1> <!-- Sayfa başlığı -->
<a href="{{ route('course-card.create') }}">Yeni Ekle</a> | 
<a href="{{ route('admin.index') }}">Admin Kontrol Paneli</a>

@if (session('success')) <!-- Başarı mesajını göster -->
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th> <!-- Kayıt ID'si -->
            <th>Kurs Adı</th> <!-- Kursun adı -->
            <th>Kurum</th> <!-- Kursun verildiği kurum -->
            <th>Yan Kazanımlar</th> <!-- Kurs sırasında kazanılan yan beceriler -->
            <th>İşlem</th> <!-- İşlemler (düzenle/sil) -->
        </tr>
    </thead>
    <tbody>
        @foreach ($courseCards as $card) <!-- Tüm kayıtları döngüyle listele -->
            <tr>
                <td>{{ $card->id }}</td> <!-- Kayıt ID'si -->
                <td>{{ $card->course_name }}</td> <!-- Kursun adı -->
                <td>{{ $card->institution }}</td> <!-- Kursun verildiği kurum -->
                <td>{{ implode(', ', $card->additional_achievements ?? []) }}</td> <!-- Yan kazanımları listele -->
                <td>
                    <a href="{{ route('course-card.edit', $card->id) }}">Düzenle</a> <!-- Düzenleme bağlantısı -->
                    <form action="{{ route('course-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                        @csrf <!-- CSRF koruması -->
                        @method('DELETE') <!-- HTTP DELETE yöntemi -->
                        <button type="submit">Sil</button> <!-- Silme butonu -->
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>