<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// LearnedFromExperiencesCard modeli, iş deneyimlerinden öğrenilen becerileri temsil eder.

class LearnedFromExperiencesCard extends Model
{
    use HasFactory;

    // Toplu atamaya izin verilen alanlar.
    protected $fillable = [
        'experience_card_id', // Bu öğrenim kaydının hangi deneyime ait olduğunu belirtir.
        'sentence',           // Öğrenilen becerinin kısa bir cümle açıklaması
        'section',            // Becerinin ait olduğu bölüm
        'work_tags'           // İşle ilgili etiketler (JSON formatında saklanır)
    ];


    // JSON verisini array olarak döndürmek için casting
    protected $casts = [
        'work_tags' => 'array', // JSON formatında saklanan alanı array olarak okuyalım.
    ];

    // İlgili deneyim kartıyla ilişki
    public function experience()
    {
        // belongsTo: Bu öğrenim kaydı yalnızca bir deneyime ait olabilir.
        return $this->belongsTo(ExperienceCard::class, 'experience_card_id');
    }
}