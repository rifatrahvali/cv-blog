@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="container table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('course-card.create') }}" class="btn btn-primary">Yeni Ekle</a>
            <h2 class="text-center">Kurslar</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>


        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Kurs Adı</th>
                    <th>Kurum</th>
                    <th>Yan Kazanımlar</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseCards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->course_name }}</td>
                        <td>{{ $card->institution }}</td>
                        <td>{{ implode(', ', $card->additional_achievements ?? []) }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('course-card.edit', $card->id) }}"
                                class="btn btn-sm btn-warning me-2">Düzenle</a>
                            <form action="{{ route('course-card.destroy', $card->id) }}" method="POST"
                                style="display:inline;">
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