@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.blog-article.create') }}" class="btn btn-secondary">Yeni Blog Ekle</a>
        <h3 class="text-center flex-grow-1">Blog Listesi</h3>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
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
                        <td>{{ $article->id }}</td>
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
                            <a href="{{ route('admin.blog-article.edit', $article->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                            <form action="{{ route('admin.blog-article.delete', $article->id) }}" method="POST" class="d-inline">
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