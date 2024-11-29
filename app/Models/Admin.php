<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Fillable alanlar: Kitle atamaya izin verilen sütunlar
    protected $fillable = [
        'name',
        'surname',
        'email',
        'username',
        'password',
        'role',
    ];

    // Şifre ve remember_token gibi hassas verilerin gizlenmesi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    // App\Models\Admin.php
    public function isOnline()
    {
        // Kullanıcının oturumunun olup olmadığını kontrol eder
        return session()->has('admin_' . $this->id);
    }
}