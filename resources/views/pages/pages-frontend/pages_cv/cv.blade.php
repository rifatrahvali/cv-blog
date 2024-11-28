@extends('layouts.frontend-cv')

@section('content')
<div class="container">
    @include('layouts.partials.frontend.header') <!-- Header -->
    <div class="line mb-3"></div>
    <div class="row">
        <section class="col-md-4 text-center mb-4 mb-md-0">
            <!-- Profil Kartı -->
            <div class="card mb-4" style="width: 100%; border-radius: 0; border: 2px solid black;">
                @include('cards.cards-frontend.cards_cv.profile-card')
            </div>

            <!-- Hakkımda Kartı -->
            <div class="card text-center mt-3 mt-md-0" style="width: 100%; border-radius: 0; border: 2px solid black;">
                @include('cards.cards-frontend.cards_cv.about-card')
            </div>
        </section>
        <section class="col-md-8 mt-md-0">
            <div class="row">
                <!-- İş Deneyimi Kartı -->
                <div class="col-md-6 mb-3">
                    @include('cards.cards-frontend.cards_cv.experience-card')
                </div>
                <!-- İş Deneyiminden Öğrenimler Kartı -->
                <div class="col-md-6 mb-3">
                    @include('cards.cards-frontend.cards_cv.learned-from-experiences-card')
                </div>
            </div>
            <div class="row">
                <!-- Eğitim Kartı -->
                <div class="col-md-6 mb-3">
                    @include('cards.cards-frontend.cards_cv.education-card')
                </div>
                <!-- Eğitimden Öğrenim Kartı -->
                <div class="col-md-6 mb-3">
                    @include('cards.cards-frontend.cards_cv.learned-from-education-card')
                </div>
            </div>
            <div class="row">
                <!-- Kurs Kartı -->
                <div class="col-md-6 mb-3">
                    @include('cards.cards-frontend.cards_cv.course-card')
                </div>
                <!-- Sertifika Kartı -->
                <div class="col-md-6 mb-3">
                    @include('cards.cards-frontend.cards_cv.certificate-card')
                </div>
            </div>

        </section>
    </div>
    @include('layouts.partials.frontend.footer') <!-- Footer buradan geliyor -->
</div>
@endsection