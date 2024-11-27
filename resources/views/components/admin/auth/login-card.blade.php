<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-sm p-4"
        style="width: 40%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <h2 class="text-center mb-4">Admin Giriş YENİ</h2>

        <form method="POST" action="{{ route('admin.auth.login') }}">
            @csrf

            <!-- Kullanıcı Adı -->
            <div class="mb-3">
                <label for="username" class="form-label"><strong>Kullanıcı Adı</strong></label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Kullanıcı Adı"
                    required>
            </div>

            <!-- Şifre -->
            <div class="mb-3">
                <label for="password" class="form-label"><strong>Şifre</strong></label>
                <!-- <input type="password" id="password" name="password" class="form-control" placeholder="Şifre" required> -->
                <input type="password" id="password" name="password" class="form-control" placeholder="Şifre" required autocomplete="off">
            </div>

            <!-- Beni Hatırla -->
            <div class="form-check mb-3">
                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Beni Hatırla</label>
            </div>

            <!-- Giriş Yap Butonu -->
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
            </div>
        </form>
    </div>
</div>