<?php

namespace App\Http\Controllers;

use App\Models\AboutCard; // AboutCard Modeli dahil ediyoruz.
use App\Models\CertificateCard; // CertificateCard Modeli dahil ediyoruz.
use App\Models\CourseCard; // CourseCard Modeli dahil ediyoruz.
use App\Models\EducationCard; // EducationCard Modeli dahil ediyoruz.
use App\Models\ExperienceCard; // ExperienceCard Modeli dahil ediyoruz.
use App\Models\LearnedFromEducationCard; // LearnedFromEducationCard Modeli dahil ediyoruz.
use App\Models\LearnedFromExperiencesCard; // LearnedFromExperiencesCard Modeli dahil ediyoruz.
use App\Models\ProfileCard; // ProfileCard Modeli dahil ediyoruz.

use Illuminate\Http\Request;

class CVPageController extends Controller
{
    // Listeleme işlemleri 
    public function index()
    {
        $profileCard = ProfileCard::first(); // Profil bilgisi, yalnızca bir kayıt olduğu için first() kullanıldı.
        $aboutCard = AboutCard::first(); // Hakkında bilgisi, yalnızca bir kayıt olduğu için first() kullanıldı.
        $certificateCard = CertificateCard::first(); // Sertifika bilgisi, yalnızca bir kayıt olduğu için first() kullanıldı.
        $courseCard = CourseCard::first(); // Kurs bilgisi, yalnızca bir kayıt olduğu için first() kullanıldı.
        $educationCard = EducationCard::first(); // Eğitim bilgisi, yalnızca bir kayıt olduğu için first() kullanıldı.
        $learnedFromEducationCard = LearnedFromEducationCard::all(); // Tüm kayıtları çekiyoruz.
        $experienceCard = ExperienceCard::first(); // İş Deneyimi bilgisi, yalnızca bir kayıt olduğu için first() kullanıldı.
        $learnedFromExperiencesCard = LearnedFromExperiencesCard::all(); // Tüm kayıtları çekiyoruz.
        // Verileri değişkenler ile frontend blade'e gönderiyoruz.
        return view('frontend.welcome', compact(
            'profileCard',
            'aboutCard',
            'certificateCard',
            'courseCard',
            'educationCard',
            'learnedFromEducationCard',
            'experienceCard',
            'learnedFromExperiencesCard'
        ));
    }

}
