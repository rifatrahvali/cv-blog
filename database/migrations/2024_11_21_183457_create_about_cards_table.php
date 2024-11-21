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
        Schema::create('about_cards', function (Blueprint $table) {
            $table->id(); // Otomatik artan benzersiz ID
            $table->text('description'); // Açıklama alanı
            $table->timestamps(); // created_at ve updated_at alanları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_cards');
    }
};
