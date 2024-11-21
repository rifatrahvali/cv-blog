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
        Schema::create('experience_cards', function (Blueprint $table) {
            $table->id(); // Benzersiz ID
            $table->string('company_name'); // Şirket adı
            $table->date('start_date'); // Başlangıç tarihi
            $table->date('end_date')->nullable(); // Ayrılış tarihi (opsiyonel)
            $table->string('department'); // Departman
            $table->string('title'); // Ünvan
            $table->timestamps(); // created_at ve updated_at otomatik olarak eklenir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_cards');
    }
};
