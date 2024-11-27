@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Profil Kartı
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- Profil Kartı -->
                        
                            <div class="card">
                                <div class="card-body text-center">
                                    <h3>{{ $admin->name }} {{ $admin->surname }}</h3>
                                    <p class="text-muted">{{ $admin->email }}</p>
                                    <p><strong>Username:</strong> {{ $admin->username }}</p>
                                    <p><strong>Role:</strong> <span class="badge bg-success">{{ ucfirst($admin->role) }}</span></p>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bilgileriGuncelle" aria-expanded="false" aria-controls="flush-collapseOne">
                    Bilgileri Güncelle
                </button>
                </h2>
                <div id="bilgileriGuncelle" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- Bilgileri Güncelle Kartı -->
                        <div class="card">
                            <!-- Bilgiler Burada Güncellenecek -->
                            <form action="{{ route('admin.updateProfile') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ad</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="surname" class="form-label">Soyad</label>
                                    <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $admin->surname) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Şifre Değişimi
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- Parola Değiştirme Kartı -->
                        
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin.updatePassword') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Yeni Parola</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Parola Onayı</label>
                                            <input type="password" name="password_confirmation" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Parolayı Güncelle</button>
                                    </form>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Diğer Adminler
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <!-- Diğer Adminler Kartı -->
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ad Soyad</th>
                                            <th>Email</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Rol</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $adminItem)
                                        <tr>
                                            <td>{{ $adminItem->id }}</td>
                                            <td>{{ $adminItem->name }} {{ $adminItem->surname }}</td>
                                            <td>{{ $adminItem->email }}</td>
                                            <td>{{ $adminItem->username }}</td>
                                            <td>
                                                <form action="{{ route('admin.updateRole', $adminItem->id) }}" method="POST">
                                                    @csrf
                                                    <input type="checkbox" name="role" 
                                                        {{ $adminItem->role == 'admin' ? 'checked' : '' }} 
                                                        onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td>
                                                @if($adminItem->id !== $admin->id)
                                                    <form action="{{ route('admin.delete', $adminItem->id) }}" method="POST" onsubmit="return confirm('Bu admini silmek istediğinize emin misiniz?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection