<?php

// Laravel'in temel dosya yapısını oluşturur.
namespace App\Models; // Bu dosyanın bulunduğu namespace, modelin konumunu belirtir.

// HasFactory trait'i, model fabrikası ile veritabanı kayıtlarını kolayca oluşturmak için kullanılır.
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Model sınıfı, Laravel'de bir veritabanı tablosunu temsil etmek için kullanılır.
use Illuminate\Database\Eloquent\Model;

// ProfileCard modeli, profil kartına ait verileri yönetmek için kullanılır.
class ProfileCard extends Model
{
    // HasFactory trait'i, bu model için fabrika işlevlerini etkinleştirir.
    use HasFactory;

    // $fillable, modelde toplu atamaya izin verilen sütunları tanımlar.
    protected $fillable = [
        'profile_image', // Kullanıcının profil görseli
        'name',          // Kullanıcının adı ve soyadı
        'title',         // Kullanıcının unvanı
        'username',      // Kullanıcının genel kullanıcı adı
        'github',        // Kullanıcının GitHub profil bağlantısı
        'instagram',     // Kullanıcının Instagram profil bağlantısı
        'youtube',       // Kullanıcının YouTube profil bağlantısı
        'x',             // Kullanıcının X (eski adıyla Twitter) profil bağlantısı
        'linkedin'       // Kullanıcının LinkedIn profil bağlantısı
    ];
}