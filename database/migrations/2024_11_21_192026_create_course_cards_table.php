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
        Schema::create('certificate_cards', function (Blueprint $table) {
            $table->id(); // Benzersiz ID
            $table->string('certificate_name'); // Sertifika adı
            $table->string('institution'); // Kursun verildiği kurum
            $table->string('field'); // Kursun alanı
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
