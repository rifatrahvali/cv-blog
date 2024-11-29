<div class="container p-0">
    <div class="row align-items-center">
        <!-- Başlıklar -->
        <div class="col-12 text-center">
            <h1 class="mb-1">{{ $siteSettings->header_title ?? 'Default Title' }}</h1>
            <h2 class="text-muted mt-1">{{ $siteSettings->header_subtitle ?? 'Default Subtitle' }}</h2>
        </div>

        <!-- Butonlar -->
        <div class="col-12 text-center">
            <div class="d-inline-block">
                <a href="{{ route('cv.index') }}" class="btn btn-outline-dark mx-2 pages" style="--bs-btn-border-radius: 0; border:2px solid black;">CV</a>
                <a href="{{ route('blogs.index') }}" class="btn btn-outline-dark mx-2 pages" style="--bs-btn-border-radius: 0; border:2px solid black;">Yazılar</a>
                <a href="{{ route('support.index') }}" class="btn btn-outline-dark mx-2 pages" style="--bs-btn-border-radius: 0; border:2px solid black;">Destek</a>
                <a href="#" class="btn btn-outline-dark mx-2 pages" style="--bs-btn-border-radius: 0; border:2px solid black;">Referans</a>
            </div>
        </div>
    </div>
</div>