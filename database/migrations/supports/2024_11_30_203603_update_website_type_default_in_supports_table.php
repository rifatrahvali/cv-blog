<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // supports_db veritabanındaki supports tablosuna bağlanıyoruz
        Schema::connection('support')->table('supports', function (Blueprint $table) {
            // website_type alanına varsayılan değer ekliyoruz
            $table->string('website_type')->default('Kurumsal')->change();
        });
    }

    public function down(): void
    {
        // Varsayılan değeri kaldırıyoruz
        Schema::connection('support')->table('supports', function (Blueprint $table) {
            $table->string('website_type')->default(null)->change();
        });
    }

};
