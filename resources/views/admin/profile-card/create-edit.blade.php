@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="card shadow-sm p-4"
        style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('profile-card.index') }}" class="btn btn-secondary">Geri Dön</a>
            <h2 class="text-center mb-4">{{ $profileCard ? 'Profil Kartı Düzenle' : 'Profil Kartı Ekle' }}</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $profileCard ? route('profile-card.update', $profileCard->id) : route('profile-card.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($profileCard)
                @method('PUT')
            @endif

            <div class="table-responsive">
                <table class="table ">
                    <tbody>
                        <!-- Profil Resmi -->
                        <tr>
                            <td class="text-end align-middle" style="vertical-align: top;">
                                <strong>Profil Resmi:</strong>
                            </td>
                            <td>
                                <div class="d-flex flex-column align-items-start">
                                    @if ($profileCard && $profileCard->profile_image)
                                        <img src="{{ asset('storage/' . $profileCard->profile_image) }}" alt="Profil Resmi"
                                            class="img-thumbnail" style="width: 100px; height: 100px;">
                                    @endif
                                    <input type="file" id="profile_image" name="profile_image"
                                        class="form-control mt-2">
                                </div>
                            </td>
                        </tr>
                        <!-- Diğer Alanlar -->
                        <tr>
                            <td class="text-end"><strong>Ad Soyad:</strong></td>
                            <td><input type="text" id="name" name="name"
                                    value="{{ old('name', $profileCard->name ?? '') }}" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>Unvan:</strong></td>
                            <td><input type="text" id="title" name="title"
                                    value="{{ old('title', $profileCard->title ?? '') }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>Kullanıcı Adı:</strong></td>
                            <td><input type="text" id="username" name="username"
                                    value="{{ old('username', $profileCard->username ?? '') }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>GitHub:</strong></td>
                            <td><input type="url" id="github_link" name="github_link"
                                    value="{{ old('github_link', $profileCard->github_link ?? 'https://github.com/username') }}"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>Instagram:</strong></td>
                            <td><input type="url" id="instagram_link" name="instagram_link"
                                    value="{{ old('instagram_link', $profileCard->instagram_link ?? 'https://instagram.com/username') }}"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>YouTube:</strong></td>
                            <td><input type="url" id="youtube_link" name="youtube_link"
                                    value="{{ old('youtube_link', $profileCard->youtube_link ?? 'https://youtube.com/username') }}"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>X:</strong></td>
                            <td><input type="url" id="x_link" name="x_link"
                                    value="{{ old('x_link', $profileCard->x_link ?? 'https://twitter.com/username') }}"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>LinkedIn:</strong></td>
                            <td><input type="url" id="linkedin_link" name="linkedin_link"
                                    value="{{ old('linkedin_link', $profileCard->linkedin_link ?? 'https://linkedin.com/in/username') }}"
                                    class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">{{ $profileCard ? 'Güncelle' : 'Kaydet' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection