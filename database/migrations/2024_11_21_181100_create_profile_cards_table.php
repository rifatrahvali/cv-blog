<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile_cards', function (Blueprint $table) {
            $table->id(); // Otomatik ID alanı
            $table->string('profile_image')->nullable(); // Profil resmi yolu
            $table->string('name'); // İsim Soyisim
            $table->string('title')->nullable(); // Ünvan
            $table->string('username')->nullable(); // Genel Kullanıcı Adı
            $table->string('github_link')->nullable(); // Github Linki
            $table->string('instagram_link')->nullable(); // Instagram Linki
            $table->string('youtube_link')->nullable(); // Youtube Linki
            $table->string('x_link')->nullable(); // X Linki
            $table->string('linkedin_link')->nullable(); // Linkedin Linki
            $table->timestamps(); // Oluşturulma ve güncellenme zamanları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_cards');
    }
};
