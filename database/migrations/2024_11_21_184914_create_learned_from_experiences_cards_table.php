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
        Schema::create('learned_from_experiences_cards', function (Blueprint $table) {
            $table->id(); // Benzersiz ID
            $table->foreignId('experience_card_id')->constrained('experience_cards')->onDelete('cascade'); // Foreign key
            $table->string('sentence'); // Bir cümlelik öğrenim açıklaması
            $table->string('section'); // Öğrenim bölümü adı
            $table->json('work_tags')->nullable(); // İş etiketleri (JSON formatı)
            $table->timestamps(); // created_at ve updated_at otomatik eklenir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learned_from_experiences_cards');
    }
};
