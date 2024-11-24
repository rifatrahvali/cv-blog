<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/styles.css') }}">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-icons.css') }}">
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-sm p-4"
        style="width: 50%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <h2 class="text-center mb-4">Admin Kayıt</h2>

        <form method="POST" action="{{ route('admin.auth.register') }}">
            @csrf

            <!-- Ad -->
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Ad</strong></label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ad" required>
            </div>

            <!-- Soyad -->
            <div class="mb-3">
                <label for="surname" class="form-label"><strong>Soyad</strong></label>
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Soyad" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label"><strong>Email</strong></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <!-- Kullanıcı Adı -->
            <div class="mb-3">
                <label for="username" class="form-label"><strong>Kullanıcı Adı</strong></label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Kullanıcı Adı"
                    required>
            </div>

            <!-- Şifre -->
            <div class="mb-3">
                <label for="password" class="form-label"><strong>Şifre</strong></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Şifre" required>
            </div>

            <!-- Şifre Tekrar -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><strong>Şifre Tekrar</strong></label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    placeholder="Şifre Tekrar" required>
            </div>

            <!-- Kayıt Ol Butonu -->
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">Kayıt Ol</button>
            </div>
        </form>
    </div>
</div>