<?php
use App\Http\Controllers\AboutCardController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\CertificateCardController;
use App\Http\Controllers\CourseCardController;
use App\Http\Controllers\CVPageController;
use App\Http\Controllers\EducationCardController;
use App\Http\Controllers\ExperienceCardController;
use App\Http\Controllers\LearnedFromEducationCardController;
use App\Http\Controllers\LearnedFromExperiencesCardController;
use App\Http\Controllers\ProfileCardController;

use Illuminate\Support\Facades\Route;
Route::get('/test', function () {
    return 'Test başarılı';
});
// Index - CV - Route
Route::get('/', [CVPageController::class, 'index'])->name('cv.index');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('admin.auth.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.auth.logout');
    Route::get('/register', [AdminAuthController::class, 'registerForm'])->name('admin.auth.register');
    Route::post('/register', [AdminAuthController::class, 'register']);

    Route::middleware('admin')->group(function () {
        Route::get('/', function () {return view('admin.index');})->name('admin.index');
        // CV - Frontend Index Routes
        Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
        Route::post('/site-settings', [SiteSettingController::class, 'storeOrUpdate'])->name('site-settings.storeOrUpdate');
        // Profile Card Routes
        // Listeleme
        Route::get('/profile-card', [ProfileCardController::class, 'index'])->name('profile-card.index');
        // Ekleme ve Güncelleme Formu
        Route::get('/profile-card/create', [ProfileCardController::class, 'create'])->name('profile-card.create');
        Route::get('/profile-card/{id}/edit', [ProfileCardController::class, 'edit'])->name('profile-card.edit');
        // Kayıt ve Güncelleme
        Route::post('/profile-card', [ProfileCardController::class, 'store'])->name('profile-card.store');
        Route::put('/profile-card/{id}', [ProfileCardController::class, 'update'])->name('profile-card.update');
        // Silme
        Route::delete('/profile-card/{id}', [ProfileCardController::class, 'destroy'])->name('profile-card.destroy');


        // About Card Routes
        Route::get('/about-card', [AboutCardController::class, 'index'])->name('about-card.index'); // Listeleme
        Route::get('/about-card/create', [AboutCardController::class, 'create'])->name('about-card.create'); // Yeni Ekleme Formu
        Route::post('/about-card', [AboutCardController::class, 'store'])->name('about-card.store'); // Yeni Kayıt
        Route::get('/about-card/{id}/edit', [AboutCardController::class, 'edit'])->name('about-card.edit'); // Düzenleme Formu
        Route::put('/about-card/{id}', [AboutCardController::class, 'update'])->name('about-card.update'); // Güncelleme
        Route::delete('/about-card/{id}', [AboutCardController::class, 'destroy'])->name('about-card.destroy'); // Silme

        // Experience Card Routes

        // Deneyim kartlarını listeleme rotası.
        Route::get('/experience-card', [ExperienceCardController::class, 'index'])->name('experience-card.index');
        // Yeni deneyim kartı ekleme formu.
        Route::get('/experience-card/create', [ExperienceCardController::class, 'create'])->name('experience-card.create');
        // Yeni deneyim kartını veritabanına kaydetme.
        Route::post('/experience-card', [ExperienceCardController::class, 'store'])->name('experience-card.store');
        // Mevcut deneyim kartını düzenleme formu.
        Route::get('/experience-card/{id}/edit', [ExperienceCardController::class, 'edit'])->name('experience-card.edit');
        // Mevcut deneyim kartını güncelleme.
        Route::put('/experience-card/{id}', [ExperienceCardController::class, 'update'])->name('experience-card.update');
        // Mevcut deneyim kartını silme.
        Route::delete('/experience-card/{id}', [ExperienceCardController::class, 'destroy'])->name('experience-card.destroy');

        // Learned from Experiences Card Routes

        // Listeleme rotası.
        Route::get('/learned-from-experiences-card', [LearnedFromExperiencesCardController::class, 'index'])->name('learned-from-experiences-card.index');
        // Yeni kayıt ekleme formu rotası.
        Route::get('/learned-from-experiences-card/create', [LearnedFromExperiencesCardController::class, 'create'])->name('learned-from-experiences-card.create');
        // Yeni kaydı veritabanına kaydetme rotası.
        Route::post('/learned-from-experiences-card', [LearnedFromExperiencesCardController::class, 'store'])->name('learned-from-experiences-card.store');
        // Mevcut kayıt düzenleme formu rotası.
        Route::get('/learned-from-experiences-card/{id}/edit', [LearnedFromExperiencesCardController::class, 'edit'])->name('learned-from-experiences-card.edit');
        // Mevcut kaydı güncelleme rotası.
        Route::put('/learned-from-experiences-card/{id}', [LearnedFromExperiencesCardController::class, 'update'])->name('learned-from-experiences-card.update');
        // Mevcut kaydı silme rotası.
        Route::delete('/learned-from-experiences-card/{id}', [LearnedFromExperiencesCardController::class, 'destroy'])->name('learned-from-experiences-card.destroy');

        // Education Card Routes

        // Listeleme rotası.
        Route::get('/education-card', [EducationCardController::class, 'index'])->name('education-card.index');
        // Yeni kayıt ekleme formu rotası.
        Route::get('/education-card/create', [EducationCardController::class, 'create'])->name('education-card.create');
        // Yeni kaydı veritabanına kaydetme rotası.
        Route::post('/education-card', [EducationCardController::class, 'store'])->name('education-card.store');
        // Mevcut kayıt düzenleme formu rotası.
        Route::get('/education-card/{id}/edit', [EducationCardController::class, 'edit'])->name('education-card.edit');
        // Mevcut kaydı güncelleme rotası.
        Route::put('/education-card/{id}', [EducationCardController::class, 'update'])->name('education-card.update');
        // Mevcut kaydı silme rotası.
        Route::delete('/education-card/{id}', [EducationCardController::class, 'destroy'])->name('education-card.destroy');

        // Learned from Education Card Routes

        // Listeleme rotası.
        Route::get('/learned-from-education-card', [LearnedFromEducationCardController::class, 'index'])->name('learned-from-education-card.index');
        // Yeni kayıt ekleme formu rotası.
        Route::get('/learned-from-education-card/create', [LearnedFromEducationCardController::class, 'create'])->name('learned-from-education-card.create');
        // Yeni kaydı veritabanına kaydetme rotası.
        Route::post('/learned-from-education-card', [LearnedFromEducationCardController::class, 'store'])->name('learned-from-education-card.store');
        // Mevcut kayıt düzenleme formu rotası.
        Route::get('/learned-from-education-card/{id}/edit', [LearnedFromEducationCardController::class, 'edit'])->name('learned-from-education-card.edit');
        // Mevcut kaydı güncelleme rotası.
        Route::put('/learned-from-education-card/{id}', [LearnedFromEducationCardController::class, 'update'])->name('learned-from-education-card.update');
        // Mevcut kaydı silme rotası.
        Route::delete('/learned-from-education-card/{id}', [LearnedFromEducationCardController::class, 'destroy'])->name('learned-from-education-card.destroy');


        // Course Card Routes
        Route::get('/course-card', [CourseCardController::class, 'index'])->name('course-card.index'); // Listeleme rotası
        Route::get('/course-card/create', [CourseCardController::class, 'create'])->name('course-card.create'); // Yeni kayıt ekleme formu rotası
        Route::post('/course-card', [CourseCardController::class, 'store'])->name('course-card.store'); // Yeni kayıt ekleme rotası
        Route::get('/course-card/{id}/edit', [CourseCardController::class, 'edit'])->name('course-card.edit'); // Düzenleme formu rotası
        Route::put('/course-card/{id}', [CourseCardController::class, 'update'])->name('course-card.update'); // Güncelleme rotası
        Route::delete('/course-card/{id}', [CourseCardController::class, 'destroy'])->name('course-card.destroy'); // Silme rotası

        // Certificate Card Routes
        Route::get('/certificate-card', [CertificateCardController::class, 'index'])->name('certificate-card.index'); // Listeleme rotası
        Route::get('/certificate-card/create', [CertificateCardController::class, 'create'])->name('certificate-card.create'); // Yeni kayıt ekleme formu rotası
        Route::post('/certificate-card', [CertificateCardController::class, 'store'])->name('certificate-card.store'); // Yeni kayıt ekleme rotası
        Route::get('/certificate-card/{id}/edit', [CertificateCardController::class, 'edit'])->name('certificate-card.edit'); // Düzenleme formu rotası
        Route::put('/certificate-card/{id}', [CertificateCardController::class, 'update'])->name('certificate-card.update'); // Güncelleme rotası
        Route::delete('/certificate-card/{id}', [CertificateCardController::class, 'destroy'])->name('certificate-card.destroy'); // Silme rotası
    });
});



