<h1>{{ $profileCard ? 'Profil Kartı Düzenle' : 'Profil Kartı Ekle' }}</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ $profileCard ? route('profile-card.update', $profileCard->id) : route('profile-card.store') }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @if ($profileCard)
        @method('PUT')
    @endif
    <div>
        <label for="profile_image">Profil Resmi:</label>
        <input type="file" id="profile_image" name="profile_image">
        @if ($profileCard && $profileCard->profile_image)
            <img src="{{ asset('storage/' . $profileCard->profile_image) }}" alt="Mevcut Profil Resmi"
                style="width: 50px; height: 50px;">
        @endif
    </div>
    <div>
        <label for="name">Ad Soyad:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $profileCard->name ?? '') }}" required>
    </div>

    <div>
        <label for="title">Unvan:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $profileCard->title ?? '') }}">
    </div>

    <div>
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" value="{{ old('username', $profileCard->username ?? '') }}">
    </div>

    <div>
        <label for="github_link">GitHub Linki:</label>
        <input type="url" id="github_link" name="github_link"
            value="{{ old('github_link', $profileCard->github_link ?? '') }}">
    </div>

    <div>
        <label for="instagram_link">Instagram Linki:</label>
        <input type="url" id="instagram_link" name="instagram_link"
            value="{{ old('instagram_link', $profileCard->instagram_link ?? '') }}">
    </div>

    <div>
        <label for="youtube_link">YouTube Linki:</label>
        <input type="url" id="youtube_link" name="youtube_link"
            value="{{ old('youtube_link', $profileCard->youtube_link ?? '') }}">
    </div>

    <div>
        <label for="x_link">X (Twitter) Linki:</label>
        <input type="url" id="x_link" name="x_link" value="{{ old('x_link', $profileCard->x_link ?? '') }}">
    </div>

    <div>
        <label for="linkedin_link">LinkedIn Linki:</label>
        <input type="url" id="linkedin_link" name="linkedin_link"
            value="{{ old('linkedin_link', $profileCard->linkedin_link ?? '') }}">
    </div>

    <button type="submit">{{ $profileCard ? 'Güncelle' : 'Kaydet' }}</button>
</form>