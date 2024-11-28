@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row gy-4">
        <!-- Kart 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Yetkili Kartı</h5>
                    <p class="card-text">Yetkili bilgilerinin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('admin.profile') }}" class="btn btn-primary">Yetkili Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Blog Kategori İsim Kartı</h5>
                    <p class="card-text">Blog Kategorileri bilgilerinin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('admin.blog-category.index') }}" class="btn btn-primary">Blog Kategorileri Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Blog Makalelerin Listesi Kartı</h5>
                    <p class="card-text">Blog Kategorileri bilgilerinin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('admin.blog-article.index') }}" class="btn btn-primary">Blog Makaleleri Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Profil Kartı</h5>
                    <p class="card-text">Kişinin profil bilgilerinin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('profile-card.index') }}" class="btn btn-primary">Profil Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 2 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Hakkımda Kartı</h5>
                    <p class="card-text">Kişi hakkındaki bilgilerin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('about-card.index') }}" class="btn btn-primary">Hakkımda Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 3 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Şirket Deneyimi Kartı</h5>
                    <p class="card-text">Kişinin deneyimlediği şirket bilgilerin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('experience-card.index') }}" class="btn btn-primary">Şirket Deneyimi Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 4 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Şirket İçi Çalışma Deneyimi Kartı</h5>
                    <p class="card-text">Kişinin deneyimlediği şirket bilgilerin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('learned-from-experiences-card.index') }}" class="btn btn-primary">İş Deneyimi Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 5 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Eğitim Bilgisi</h5>
                    <p class="card-text">Kişinin eğitim bilgilerin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('education-card.index') }}" class="btn btn-primary">Eğitim Bilgisi Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 6 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Eğitim Süresindeki Deneyimleri</h5>
                    <p class="card-text">Kişinin eğitiminde deneyimlediği bilgilerin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('learned-from-education-card.index') }}" class="btn btn-primary">Eğitimde Öğrenilenler Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 7 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Kurslar Kartı</h5>
                    <p class="card-text">Kişinin katılmış olduğu kurslar hakkında bilgilerin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('course-card.index') }}" class="btn btn-primary">Kurslar Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 8 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Sertifika Kartı</h5>
                    <p class="card-text">Kişinin sertifikaları hakkında bilgilerin tutulduğu kart alanıdır.</p>
                    <a href="{{ route('certificate-card.index') }}" class="btn btn-primary">Sertifikalar Kartına Git</a>
                </div>
            </div>
        </div>
        <!-- Kart 8 -->
        <div class="col-md-4 col-sm-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Site Ayarları Kartı</h5>
                    <p class="card-text">Site'nin Header ve Footer kısmında düzenleme kart alanıdır.</p>
                    <a href="{{ route('site-settings.index') }}" class="btn btn-primary">Site Ayarları Kartına Git</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection