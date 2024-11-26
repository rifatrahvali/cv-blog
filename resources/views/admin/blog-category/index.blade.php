

@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('admin.blog-category.create') }}" class="btn btn-secondary">Yeni Ekle</a>
            <h3 class="text-center flex-grow-1">Kategoriler</h3>
            <a href="#" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Kategori Adı</th>
                        <th>Üst Kategori</th>
                        <th>Görünüm Durumu</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent ? $category->parent->name : 'Yok' }}</td>
                            <td>
                                <span class="badge {{ $category->is_visible ? 'bg-success' : 'bg-danger' }}">
                                    {{ $category->is_visible ? 'Görünür' : 'Görünmez' }}
                                </span>
                            </td>
                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.blog-category.edit', $category->id) }}"
                                    class="btn btn-warning btn-sm">Düzenle</a>
                                <form action="{{ route('admin.blog-category.delete', $category->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
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