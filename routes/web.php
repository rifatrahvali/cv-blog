<?php
use Illuminate\Support\Facades\Route;
// Admin Controllers
use App\Http\Controllers\Admin\AboutCardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BlogArticleController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\CertificateCardController;
use App\Http\Controllers\Admin\CourseCardController;
use App\Http\Controllers\Admin\EducationCardController;
use App\Http\Controllers\Admin\ExperienceCardController;
use App\Http\Controllers\Admin\LearnedFromEducationCardController;
use App\Http\Controllers\Admin\LearnedFromExperiencesCardController;
use App\Http\Controllers\Admin\ProfileCardController;
// Frontend Controllers
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CVPageController;
// Public Routes (Herkesin erişebileceği rotalar)
Route::get('/', [CVPageController::class, 'index'])->name('cv.index');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/category/{slug}', [BlogController::class, 'filterByCategory'])->name('blogs.byCategory');


// Admin Routes
Route::prefix('admin')->group(function () {
    // Giriş yapmamış adminler için izin verilen rotalar
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('admin.auth.login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Giriş yapmış adminler için rotalar
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.auth.logout');

	    Route::get('/register', [AdminAuthController::class, 'registerForm'])->name('admin.auth.register');
        Route::post('/register', [AdminAuthController::class, 'register']);

        // Admin Ana Panel
        Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index');

        // Admin Profil Yönetimi
        Route::get('/profile', [AdminProfileController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/update-password', [AdminProfileController::class, 'updatePassword'])->name('admin.updatePassword');
        Route::post('/admin/profile/update', [AdminProfileController::class, 'profileUpdate'])->name('admin.updateProfile');
        Route::post('/admins/update-role/{id}', [AdminProfileController::class, 'updateRole'])->name('admin.updateRole');
        Route::delete('/admin/{id}/delete', [AdminProfileController::class, 'deleteAdmin'])->name('admin.delete');

        // Site Ayarları Yönetimi
        Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
        Route::post('/site-settings', [SiteSettingController::class, 'storeOrUpdate'])->name('site-settings.storeOrUpdate');

        // Blog Kategori Yönetimi
        Route::get('/blog-category', [BlogCategoryController::class, 'index'])->name('admin.blog-category.index');
        Route::get('/blog-category/create', [BlogCategoryController::class, 'create'])->name('admin.blog-category.create');
        Route::post('/blog-category/store', [BlogCategoryController::class, 'store'])->name('admin.blog-category.store');
        Route::get('/blog-category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('admin.blog-category.edit');
        Route::post('/blog-category/update/{id}', [BlogCategoryController::class, 'update'])->name('admin.blog-category.update');
        Route::post('/blog-category/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('admin.blog-category.delete');

        // Blog Makale Yönetimi
        Route::get('/blog-article', [BlogArticleController::class, 'index'])->name('admin.blog-article.index');
        Route::get('/blog-article/create', [BlogArticleController::class, 'create'])->name('admin.blog-article.create');
        Route::post('/blog-article/store', [BlogArticleController::class, 'store'])->name('admin.blog-article.store');
        Route::get('/blog-article/edit/{blogArticle}', [BlogArticleController::class, 'edit'])->name('admin.blog-article.edit');
        Route::put('/blog-article/update/{blogArticle}', [BlogArticleController::class, 'update'])->name('admin.blog-article.update');
        Route::delete('/blog-article/delete/{blogArticle}', [BlogArticleController::class, 'destroy'])->name('admin.blog-article.delete');

        // Profil Kartı Yönetimi
        Route::get('/profile-card', [ProfileCardController::class, 'index'])->name('profile-card.index');
        Route::get('/profile-card/create', [ProfileCardController::class, 'create'])->name('profile-card.create');
        Route::get('/profile-card/{id}/edit', [ProfileCardController::class, 'edit'])->name('profile-card.edit');
        Route::post('/profile-card', [ProfileCardController::class, 'store'])->name('profile-card.store');
        Route::put('/profile-card/{id}', [ProfileCardController::class, 'update'])->name('profile-card.update');
        Route::delete('/profile-card/{id}', [ProfileCardController::class, 'destroy'])->name('profile-card.destroy');

        // About Kartı Yönetimi
        Route::get('/about-card', [AboutCardController::class, 'index'])->name('about-card.index');
        Route::get('/about-card/create', [AboutCardController::class, 'create'])->name('about-card.create');
        Route::post('/about-card', [AboutCardController::class, 'store'])->name('about-card.store');
        Route::get('/about-card/{id}/edit', [AboutCardController::class, 'edit'])->name('about-card.edit');
        Route::put('/about-card/{id}', [AboutCardController::class, 'update'])->name('about-card.update');
        Route::delete('/about-card/{id}', [AboutCardController::class, 'destroy'])->name('about-card.destroy');

        // Deneyim Kartı Yönetimi
        Route::get('/experience-card', [ExperienceCardController::class, 'index'])->name('experience-card.index');
        Route::get('/experience-card/create', [ExperienceCardController::class, 'create'])->name('experience-card.create');
        Route::post('/experience-card', [ExperienceCardController::class, 'store'])->name('experience-card.store');
        Route::get('/experience-card/{id}/edit', [ExperienceCardController::class, 'edit'])->name('experience-card.edit');
        Route::put('/experience-card/{id}', [ExperienceCardController::class, 'update'])->name('experience-card.update');
        Route::delete('/experience-card/{id}', [ExperienceCardController::class, 'destroy'])->name('experience-card.destroy');

        // Eğitim Kartı Yönetimi
        Route::get('/education-card', [EducationCardController::class, 'index'])->name('education-card.index');
        Route::get('/education-card/create', [EducationCardController::class, 'create'])->name('education-card.create');
        Route::post('/education-card', [EducationCardController::class, 'store'])->name('education-card.store');
        Route::get('/education-card/{id}/edit', [EducationCardController::class, 'edit'])->name('education-card.edit');
        Route::put('/education-card/{id}', [EducationCardController::class, 'update'])->name('education-card.update');
        Route::delete('/education-card/{id}', [EducationCardController::class, 'destroy'])->name('education-card.destroy');

       // Learned From Education Kartı
       Route::get('/learned-from-education-card', [LearnedFromEducationCardController::class, 'index'])->name('learned-from-education-card.index');
       Route::get('/learned-from-education-card/create', [LearnedFromEducationCardController::class, 'create'])->name('learned-from-education-card.create');
       Route::post('/learned-from-education-card', [LearnedFromEducationCardController::class, 'store'])->name('learned-from-education-card.store');
       Route::get('/learned-from-education-card/{id}/edit', [LearnedFromEducationCardController::class, 'edit'])->name('learned-from-education-card.edit');
       Route::put('/learned-from-education-card/{id}', [LearnedFromEducationCardController::class, 'update'])->name('learned-from-education-card.update');
       Route::delete('/learned-from-education-card/{id}', [LearnedFromEducationCardController::class, 'destroy'])->name('learned-from-education-card.destroy');

        // Learned From Experiences Kartı
        Route::get('/learned-from-experiences-card', [LearnedFromExperiencesCardController::class, 'index'])->name('learned-from-experiences-card.index');
        Route::get('/learned-from-experiences-card/create', [LearnedFromExperiencesCardController::class, 'create'])->name('learned-from-experiences-card.create');
        Route::post('/learned-from-experiences-card', [LearnedFromExperiencesCardController::class, 'store'])->name('learned-from-experiences-card.store');
        Route::get('/learned-from-experiences-card/{id}/edit', [LearnedFromExperiencesCardController::class, 'edit'])->name('learned-from-experiences-card.edit');
        Route::put('/learned-from-experiences-card/{id}', [LearnedFromExperiencesCardController::class, 'update'])->name('learned-from-experiences-card.update');
        Route::delete('/learned-from-experiences-card/{id}', [LearnedFromExperiencesCardController::class, 'destroy'])->name('learned-from-experiences-card.destroy');

	// Course Card Routes
       Route::get('/course-card', [CourseCardController::class, 'index'])->name('course-card.index'); // Listeleme rotası
       Route::get('/course-card/create', [CourseCardController::class, 'create'])->name('course-card.create'); // Yeni kayıt ekleme formu rotası
       Route::post('/course-card', [CourseCardController::class, 'store'])->name('course-card.store'); // Yeni kayıt ekleme rotası
       Route::get('/course-card/{id}/edit', [CourseCardController::class, 'edit'])->name('course-card.edit'); // Düzenleme formu rotası
       Route::put('/course-card/{id}', [CourseCardController::class, 'update'])->name('course-card.update'); // Güncelleme rotası
       Route::delete('/course-card/{id}', [CourseCardController::class, 'destroy'])->name('course-card.destroy'); // Silme rotası

        // Sertifika Kartı Yönetimi
        Route::get('/certificate-card', [CertificateCardController::class, 'index'])->name('certificate-card.index');
        Route::get('/certificate-card/create', [CertificateCardController::class, 'create'])->name('certificate-card.create');
        Route::post('/certificate-card', [CertificateCardController::class, 'store'])->name('certificate-card.store');
        Route::get('/certificate-card/{id}/edit', [CertificateCardController::class, 'edit'])->name('certificate-card.edit');
        Route::put('/certificate-card/{id}', [CertificateCardController::class, 'update'])->name('certificate-card.update');
        Route::delete('/certificate-card/{id}', [CertificateCardController::class, 'destroy'])->name('certificate-card.destroy');
    });
});



