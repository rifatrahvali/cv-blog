<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Primary key alanı
            $table->string('name'); // Admin adı için sütun
            $table->string('surname'); // Admin soyadı için sütun
            $table->string('email')->unique(); // Email alanı, benzersiz olmalı
            $table->string('username')->unique(); // kullanıcı adı alanı, benzersiz olmalı
            $table->string('password'); // Şifre alanı
            $table->rememberToken();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
