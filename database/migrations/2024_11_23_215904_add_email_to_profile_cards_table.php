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
        Schema::table('profile_cards', function (Blueprint $table) {
            $table->string('email')->nullable()->after('username'); // Email sütununu ekliyoruz
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_cards', function (Blueprint $table) {
            //
            $table->dropColumn('email'); // Geri alma işlemi
        });
    }
};
