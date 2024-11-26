@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="{{ route('admin.blog-article.create') }}" class="btn btn-primary mb-3">Yeni Blog Ekle</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Kategori</th>
                <th>Görünürlük</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name ?? 'Yok' }}</td>
                    <td>{{ $article->is_visible ? 'Görünür' : 'Görünmez' }}</td>
                    <td>
                        <a href="{{ route('admin.blog-article.edit', $article->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                        <form action="{{ route('admin.blog-article.delete', $article->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection