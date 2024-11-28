<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4"
        style="width: 90%; background-color: #f8f9fa; border-radius: 12px; border: 1px solid #e3e6e9;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            
            <h2 class="text-center">Site Ayarları</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Admin Kontrol Paneli</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('site-settings.storeOrUpdate') }}" method="POST">
            @csrf

            <!-- Başlık -->
            <div class="mb-3">
                <label for="header_title" class="form-label"><strong>Başlık:</strong></label>
                <input type="text" id="header_title" name="header_title"
                    value="{{ old('header_title', $settings->header_title ?? '') }}"
                    class="form-control @error('header_title') is-invalid @enderror" placeholder="Başlık girin"
                    required>
                @error('header_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alt Başlık -->
            <div class="mb-3">
                <label for="header_subtitle" class="form-label"><strong>Alt Başlık:</strong></label>
                <input type="text" id="header_subtitle" name="header_subtitle"
                    value="{{ old('header_subtitle', $settings->header_subtitle ?? '') }}"
                    class="form-control @error('header_subtitle') is-invalid @enderror" placeholder="Alt Başlık girin"
                    required>
                @error('header_subtitle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Altbilgi Metni -->
            <div class="mb-3">
                <label for="footer_text" class="form-label"><strong>Altbilgi Metni:</strong></label>
                <input type="text" id="footer_text" name="footer_text"
                    value="{{ old('footer_text', $settings->footer_text ?? '') }}"
                    class="form-control @error('footer_text') is-invalid @enderror" placeholder="Altbilgi metni girin"
                    required>
                @error('footer_text')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Altbilgi Yılı -->
            <div class="mb-3">
                <label for="footer_year" class="form-label"><strong>Altbilgi Yılı:</strong></label>
                <input type="number" id="footer_year" name="footer_year"
                    value="{{ old('footer_year', $settings->footer_year ?? '') }}"
                    class="form-control @error('footer_year') is-invalid @enderror" placeholder="Yıl girin (örn. 2024)"
                    min="1900" max="{{ date('Y') }}" required>
                @error('footer_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary w-100">Kaydet</button>
            </div>
        </form>
    </div>
</div>