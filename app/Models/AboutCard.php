<?php

// Laravel'deki model dosyasını tanımlayan namespace.
namespace App\Models;

// HasFactory trait'i, bu model için fabrika kullanımını sağlar.
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Model sınıfı, veritabanı tablosunu temsil eder.
use Illuminate\Database\Eloquent\Model;

// AboutCard modeli, "Hakkımda" kartındaki bilgileri yönetmek için kullanılır.
class AboutCard extends Model
{
    use HasFactory; // HasFactory trait'ini kullanarak model fabrikası işlemleri etkinleştirilir.

    // $fillable, toplu atamaya izin verilen alanları tanımlar.
    protected $fillable = [
        'description', // Hakkımda açıklamasını içeren metin alanı
    ];
}