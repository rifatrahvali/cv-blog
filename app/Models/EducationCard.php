<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// EducationCard modeli, kullanıcıların eğitim geçmişini temsil eder.
class EducationCard extends Model
{
    use HasFactory;

    // Toplu atamaya izin verilen alanlar.
    protected $fillable = [
        'city',         // Eğitimin gerçekleştiği şehir
        'school_name',  // Okulun adı
        'department',   // Bölüm adı
        'start_year',   // Eğitimin başlangıç yılı
        'end_year'      // Eğitimin bitiş yılı
    ];

    // Bu ilişki, eğitime ait birden fazla öğrenim kaydını temsil eder.
    public function learnedFromEducation()
    {
        return $this->hasMany(LearnedFromEducationCard::class, 'education_card_id');
        // hasMany: Bu eğitim birden fazla öğrenim kaydıyla ilişkilendirilebilir.
    }
}