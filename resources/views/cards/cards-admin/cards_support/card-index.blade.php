<h1 class="text-center mb-4">Destek Talepleri</h1>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Bütçe</th>
            <th>Proje Açıklaması</th>
            <th>Logo Durumu</th>
            <th>Sayfa Sayısı</th>
            <th>Renk Tercihleri</th>
            <th>Hedef Kitle</th>
            <th>Rakip Web Siteleri</th>
            <th>Beğendiğiniz Web Siteleri</th>
            <th>Ek Yorum</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($supportRequests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->first_name }}</td>
                <td>{{ $request->last_name }}</td>
                <td>{{ $request->email }}</td>
                <td>{{ $request->phone }}</td>
                <td>{{ $request->budget }}</td>
                <td>{{ \Illuminate\Support\Str::limit($request->project_description, 50, '...') }}</td>
                <td>{{ $request->has_logo === 'yes' ? 'Evet' : 'Hayır' }}</td>
                <td>{{ $request->page_count }}</td>
                <td>{{ \Illuminate\Support\Str::limit($request->color_preferences ?? 'Belirtilmedi', 50, '...') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($request->target_audience, 50, '...') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($request->competitor_websites ?? 'Belirtilmedi', 50, '...') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($request->liked_websites ?? 'Belirtilmedi', 50, '...') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($request->additional_comments ?? 'Belirtilmedi', 50, '...') }}</td>
                <td>
                    <a href="{{ route('admin.support-forms.show', $request->id) }}" class="btn btn-warning btn-sm">Teklifi
                        İncele</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="15" class="text-center">Hiçbir destek talebi bulunamadı.</td>
            </tr>
        @endforelse
    </tbody>
</table>