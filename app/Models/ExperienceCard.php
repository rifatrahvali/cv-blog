<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ExperienceCard modeli, kullanıcıların iş deneyimlerini temsil eder.
class ExperienceCard extends Model
{
    use HasFactory; // Model fabrikası kullanımını etkinleştirir.

    // $fillable, toplu atamaya izin verilen alanları tanımlar.
    protected $fillable = [
        'company_name', // Şirketin adı
        'start_date',   // Deneyimin başlangıç tarihi
        'end_date',     // Deneyimin bitiş tarihi
        'department',   // Çalışılan departman
        'title'         // Kullanıcının unvanı
    ];

    // Bu ilişki, bir deneyime ait birden fazla öğrenim kaydını temsil eder.
    public function learnedFromExperiences()
    {
        return $this->hasMany(LearnedFromExperiencesCard::class, 'experience_card_id');
        // hasMany: Bu deneyim birden fazla öğrenim kaydıyla ilişkilendirilebilir.
    }
}