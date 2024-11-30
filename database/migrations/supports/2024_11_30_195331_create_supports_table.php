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
        if (!Schema::connection('support')->hasTable('supports')) {
            Schema::connection('support')->create('supports', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->string('phone');
                $table->string('budget');
                $table->string('website_type');
                $table->text('project_description');
                $table->string('has_logo');
                $table->string('deadline');
                $table->string('page_count');
                $table->string('has_hosting')->nullable();
                $table->string('use_existing_content')->nullable();
                $table->string('target_audience');
                $table->string('color_preferences')->nullable();
                $table->text('competitor_websites')->nullable();
                $table->text('liked_websites')->nullable();
                $table->text('additional_comments')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
