<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// LearnedFromEducationCard modeli, eğitimden öğrenilen becerileri temsil eder.
class LearnedFromEducationCard extends Model
{
    use HasFactory;

    // Toplu atamaya izin verilen alanlar.
    protected $fillable = [
        'education_card_id',    // Bu öğrenim kaydının hangi eğitime ait olduğunu belirtir.
        'degree',               // Eğitim derecesi (ör. Lisans, Lise)
        'main_achievement',     // Eğitimin temel kazanımı
        'secondary_achievements' // Yan kazanımlar (JSON formatında saklanır)
    ];

    // secondary_achievements alanını JSON formatında okuma/yazma olarak belirler.
    protected $casts = [
        'secondary_achievements' => 'array',
    ];

    // Bu ilişki, öğrenim kaydının hangi eğitime ait olduğunu belirtir.
    public function education()
    {
        return $this->belongsTo(EducationCard::class, 'education_card_id');
        // belongsTo: Bu öğrenim kaydı yalnızca bir eğitime ait olabilir.
    }
}