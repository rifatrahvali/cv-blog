@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.blog-article.create') }}" class="btn btn-secondary">Yeni Blog Ekle</a>
        <h3 class="text-center flex-grow-1">Blog Listesi</h3>
        <!-- Filtreleme Formu -->
        <div class="filter-blogs me-3">
            <form method="GET" action="{{ route('admin.blog-article.index') }}" class="d-flex align-items-center">
                <label for="category_id" class="form-label me-2 mb-0">Kategori:</label>
                <select name="category_id" id="category_id" class="form-select w-auto me-2">
                    <option value="">Tümü</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-secondary">Filtrele</button>
            </form>
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Görünürlük Durumu</th>
                    <th>Yayınlanma Tarihi</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name ?? 'Yok' }}</td>
                        <td>
                            @if($article->is_visible)
                                <span class="badge bg-success">Görünür</span>
                            @else
                                <span class="badge bg-danger">Görünmez</span>
                            @endif
                        </td>
                        <td>{{ $article->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.blog-article.edit', $article->id) }}"
                                class="btn btn-warning btn-sm">Düzenle</a>
                            <form action="{{ route('admin.blog-article.delete', $article->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection