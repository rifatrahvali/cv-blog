<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnedFromEducationCard extends Model
{
    use HasFactory;

    // Toplu atamaya izin verilen alanlar.
    protected $fillable = [
        'education_card_id', // Bu kaydın ilişkili olduğu education_card ID.
        'degree', // Eğitim derecesi (ör. Lisans, Lise).
        'main_achievement', // Temel kazanım.
        'secondary_achievements' // Yan kazanımlar (JSON formatında).
    ];

    // secondary_achievements alanını JSON olarak işle.
    protected $casts = [
        'secondary_achievements' => 'array',
    ];

    // İlişki: Bu kaydın ait olduğu EducationCard.
    public function education()
    {
        return $this->belongsTo(EducationCard::class, 'education_card_id');
        // belongsTo: Bu öğrenim kaydı yalnızca bir eğitime ait olabilir.
    }
}