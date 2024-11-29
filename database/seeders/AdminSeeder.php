<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Varsayılan admin kullanıcı
        Admin::firstOrCreate(
            ['email' => 'admin@example.com'], // varsayılan mail
            [
                'name' => 'Default', // varsayılan isim
                'surname' => 'Admin', // varsayılan soyisim
                'username' => 'admin', // varsayılan rol
                'password' => Hash::make('admin123'), // Varsayılan şifre
                'role' => 'admin', // Admin rolü
            ]
        );
    }
}
