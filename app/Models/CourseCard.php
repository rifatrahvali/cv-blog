<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// CourseCard modeli, kullanıcıların katıldığı kursları temsil eder.
class CourseCard extends Model
{
    use HasFactory;

    // Toplu atamaya izin verilen alanlar.
    protected $fillable = [
        'course_name',            // Kursun adı
        'institution',            // Kursun verildiği kurum
        'additional_achievements' // Kurs sırasında kazanılan yan beceriler (JSON formatında saklanır)
    ];

    // additional_achievements alanını JSON formatında okuma/yazma olarak belirler.
    protected $casts = [
        'additional_achievements' => 'array',
    ];
}