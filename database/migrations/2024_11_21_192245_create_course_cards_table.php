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
        Schema::create('course_cards', function (Blueprint $table) {
            $table->id(); // Benzersiz ID
            $table->string('course_name'); // Kurs adı
            $table->string('institution'); // Kursun verildiği kurum
            $table->json('additional_achievements')->nullable(); // Yan kazanımlar (etiketler, JSON formatında)
            $table->timestamps(); // created_at ve updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_cards');
    }
};
