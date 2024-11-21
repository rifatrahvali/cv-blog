<?php

use App\Http\Controllers\ProfileCardController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    // Admin Index Routes
    Route::get(
        '/',
        [AdminIndexController::class, 'index']
    )
        ->name('admin.index'); // Admin ana sayfa

    // Profile Card Routes
    Route::get(
        '/profile-card',
        [ProfileCardController::class, 'index']
    )
        ->name('ProfileCard.index'); // Listeleme
    Route::get(
        '/profile-card/create',
        [ProfileCardController::class, 'create']
    )
        ->name('ProfileCard.create'); // Form göster
    Route::post(
        '/profile-card',
        [ProfileCardController::class, 'store']
    )
        ->name('ProfileCard.store'); // Yeni kayıt
    Route::get(
        '/profile-card/{id}/edit',
        [ProfileCardController::class, 'edit']
    )
        ->name('ProfileCard.edit'); // Düzenleme formu
    Route::put(
        '/profile-card/{id}',
        [ProfileCardController::class, 'update']
    )
        ->name('ProfileCard.update'); // Güncelleme
    Route::delete(
        '/profile-card/{id}',
        [ProfileCardController::class, 'destroy']
    )
        ->name('ProfileCard.destroy'); // Silme

    // About Card Routes
    Route::get(
        '/about-card',
        [AboutCardController::class, 'index']
    )
        ->name('AboutCard.index');

    Route::get(
        '/about-card/create',
        [AboutCardController::class, 'create']
    )
        ->name('AboutCard.create');

    Route::post(
        '/about-card',
        [AboutCardController::class, 'store']
    )
        ->name('AboutCard.store');

    Route::get(
        '/about-card/{id}/edit',
        [AboutCardController::class, 'edit']
    )
        ->name('AboutCard.edit');
    Route::put(
        '/about-card/{id}',
        [AboutCardController::class, 'update']
    )
        ->name('AboutCard.update');
    Route::delete(
        '/about-card/{id}',
        [AboutCardController::class, 'destroy']
    )
        ->name('AboutCard.destroy');

    // Experience Card Routes
    Route::get(
        '/experience-card',
        [ExperienceCardController::class, 'index']
    )
        ->name('ExperienceCard.index');
    Route::get(
        '/experience-card/create',
        [ExperienceCardController::class, 'create']
    )
        ->name('ExperienceCard.create');
    Route::post(
        '/experience-card',
        [ExperienceCardController::class, 'store']
    )
        ->name('ExperienceCard.store');
    Route::get(
        '/experience-card/{id}/edit',
        [ExperienceCardController::class, 'edit']
    )
        ->name('ExperienceCard.edit');
    Route::put(
        '/experience-card/{id}',
        [ExperienceCardController::class, 'update']
    )
        ->name('ExperienceCard.update');
    Route::delete(
        '/experience-card/{id}',
        [ExperienceCardController::class, 'destroy']
    )
        ->name('ExperienceCard.destroy');

    // Learned from Experiences Card Routes
    Route::get(
        '/learned-from-experiences-card',
        [LearnedFromExperiencesCardController::class, 'index']
    )
        ->name('LearnedFromExperiencesCard.index');

    Route::get(
        '/learned-from-experiences-card/create',
        [LearnedFromExperiencesCardController::class, 'create']
    )
        ->name('LearnedFromExperiencesCard.create');

    Route::post(
        '/learned-from-experiences-card',
        [LearnedFromExperiencesCardController::class, 'store']
    )
        ->name('LearnedFromExperiencesCard.store');

    Route::get(
        '/learned-from-experiences-card/{id}/edit',
        [LearnedFromExperiencesCardController::class, 'edit']
    )
        ->name('LearnedFromExperiencesCard.edit');

    Route::put(
        '/learned-from-experiences-card/{id}',
        [LearnedFromExperiencesCardController::class, 'update']
    )
        ->name('LearnedFromExperiencesCard.update');

    Route::delete(
        '/learned-from-experiences-card/{id}',
        [LearnedFromExperiencesCardController::class, 'destroy']
    )
        ->name('LearnedFromExperiencesCard.destroy');

    // Education Card Routes
    Route::get(
        '/education-card',
        [EducationCardController::class, 'index']
    )
        ->name('EducationCard.index');
    Route::get(
        '/education-card/create',
        [EducationCardController::class, 'create']
    )
        ->name('EducationCard.create');
    Route::post(
        '/education-card',
        [EducationCardController::class, 'store']
    )
        ->name('EducationCard.store');
    Route::get(
        '/education-card/{id}/edit',
        [EducationCardController::class, 'edit']
    )
        ->name('EducationCard.edit');
    Route::put(
        '/education-card/{id}',
        [EducationCardController::class, 'update']
    )
        ->name('EducationCard.update');
    Route::delete(
        '/education-card/{id}',
        [EducationCardController::class, 'destroy']
    )
        ->name('EducationCard.destroy');

    // Learned from Education Card Routes
    Route::get(
        '/learned-from-education-card',
        [LearnedFromEducationCardController::class, 'index']
    )
        ->name('LearnedFromEducationCard.index');
    Route::get(
        '/learned-from-education-card/create',
        [LearnedFromEducationCardController::class, 'create']
    )
        ->name('LearnedFromEducationCard.create');
    Route::post(
        '/learned-from-education-card',
        [LearnedFromEducationCardController::class, 'store']
    )
        ->name('LearnedFromEducationCard.store');
    Route::get(
        '/learned-from-education-card/{id}/edit',
        [LearnedFromEducationCardController::class, 'edit']
    )
        ->name('LearnedFromEducationCard.edit');
    Route::put(
        '/learned-from-education-card/{id}',
        [LearnedFromEducationCardController::class, 'update']
    )
        ->name('LearnedFromEducationCard.update');
    Route::delete(
        '/learned-from-education-card/{id}',
        [LearnedFromEducationCardController::class, 'destroy']
    )
        ->name('LearnedFromEducationCard.destroy');

    // Course Card Routes
    Route::get(
        '/course-card',
        [CourseCardController::class, 'index']
    )
        ->name('CourseCard.index');
    Route::get(
        '/course-card/create',
        [CourseCardController::class, 'create']
    )
        ->name('CourseCard.create');
    Route::post(
        '/course-card',
        [CourseCardController::class, 'store']
    )
        ->name('CourseCard.store');
    Route::get(
        '/course-card/{id}/edit',
        [CourseCardController::class, 'edit']
    )
        ->name('CourseCard.edit');
    Route::put(
        '/course-card/{id}',
        [CourseCardController::class, 'update']
    )
        ->name('CourseCard.update');
    Route::delete(
        '/course-card/{id}',
        [CourseCardController::class, 'destroy']
    )
        ->name('CourseCard.destroy');

    // Certificate Card Routes
    Route::get(
        '/certificate-card',
        [CertificateCardController::class, 'index']
    )
        ->name('CertificateCard.index');
    Route::get(
        '/certificate-card/create',
        [CertificateCardController::class, 'create']
    )
        ->name('CertificateCard.create');
    Route::post(
        '/certificate-card',
        [CertificateCardController::class, 'store']
    )
        ->name('CertificateCard.store');
    Route::get(
        '/certificate-card/{id}/edit',
        [CertificateCardController::class, 'edit']
    )
        ->name('CertificateCard.edit');
    Route::put(
        '/certificate-card/{id}',
        [CertificateCardController::class, 'update']
    )
        ->name('CertificateCard.update');
    Route::delete(
        '/certificate-card/{id}',
        [CertificateCardController::class, 'destroy']
    )
        ->name('CertificateCard.destroy');
});



