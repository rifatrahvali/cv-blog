@extends('layouts.frontend')

@section('content')
<div class="container">
    @include('layouts.partials.frontend.header') <!-- Header buradan geliyor -->
    <div class="line mb-3"></div>
    <div class="row">

        <section class="col-md-4 text-center">
            <!-- Profil Kartı -->
            <div class="card mb-3" style="width: 100%; border-radius: 0; border: 2px solid black;">
                @include('components.frontend.welcome.profile-card')
            </div>

            <!-- Hakkımda Kartı -->
            <div class="card text-center mt-3" style="width: 100%; border-radius: 0; border: 2px solid black;">
                @include('components.frontend.welcome.about-card')
            </div>
        </section>

        <section class="col-md-8">
            <div class="row">
                <!-- İş Deneyimi Kartı -->
                <div class="col-md-6 mb-3">
                    @include('components.frontend.welcome.experience-card')
                </div>
                <!-- İş Deneyiminden Öğrenimler Kartı -->
                <div class="col-md-6 mb-3">
                    @include('components.frontend.welcome.learned-from-experiences-card')
                </div>
            </div>
            <div class="row">
                <!-- Eğitim Kartı -->
                <div class="col-md-6 mb-3">
                    @include('components.frontend.welcome.education-card')
                </div>
                <!-- Eğitimden Öğrenim Kartı -->
                <div class="col-md-6 mb-3">
                    @include('components.frontend.welcome.learned-from-education-card')
                </div>
            </div>
            <div class="row">
                <!-- Kurs Kartı -->
                <div class="col-md-6 mb-3">
                    @include('components.frontend.welcome.course-card')
                </div>
                <!-- Sertifika Kartı -->
                <div class="col-md-6 mb-3">
                    @include('components.frontend.welcome.certificate-card')
                </div>
            </div>

        </section>
    </div>
    @include('layouts.partials.frontend.footer') <!-- Footer buradan geliyor -->
</div>
@endsection