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
        Schema::create('learned_from_education_cards', function (Blueprint $table) {
            $table->id(); // Benzersiz ID
            $table->foreignId('education_card_id')->constrained('education_cards')->onDelete('cascade'); // İlişkili education_card ID
            $table->string('degree'); // Okul derecesi (ör. Lisans, Lise)
            $table->string('main_achievement'); // Temel kazanım
            $table->json('secondary_achievements')->nullable(); // Yan kazanımlar (JSON formatında etiketler)
            $table->timestamps(); // created_at ve updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learned_from_education_cards');
    }
};
