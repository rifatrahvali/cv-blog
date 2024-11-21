<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// CertificateCard modeli, kullanıcıların kazandığı sertifikaları temsil eder.
class CertificateCard extends Model
{
    use HasFactory;

    // Toplu atamaya izin verilen alanlar.
    protected $fillable = [
        'certificate_name', // Sertifikanın adı
        'institution',      // Sertifikayı veren kurum
        'field'             // Sertifikayla ilgili alan (ör. Yazılım, Yönetim)
    ];
}