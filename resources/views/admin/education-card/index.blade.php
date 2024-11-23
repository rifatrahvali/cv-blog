@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="container table-container">
        <h1 class="text-center mb-4">Eğitim Kartları</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('education-card.create') }}" class="btn btn-primary">Yeni Eğitim Ekle</a>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Eğitim Seviyesi</th>
                    <th>Şehir</th>
                    <th>Okul Adı</th>
                    <th>Bölüm</th>
                    <th>Başlangıç Yılı</th>
                    <th>Bitiş Yılı</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educationCards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->section }}</td>
                        <td>{{ $card->city }}</td>
                        <td>{{ $card->school_name }}</td>
                        <td>{{ $card->department }}</td>
                        <td>{{ $card->start_year }}</td>
                        <td>{{ $card->end_year ? $card->end_year : 'Devam Ediyor' }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('education-card.edit', $card->id) }}" class="btn btn-sm btn-warning me-2">Düzenle</a>
                            <form action="{{ route('education-card.destroy', $card->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection