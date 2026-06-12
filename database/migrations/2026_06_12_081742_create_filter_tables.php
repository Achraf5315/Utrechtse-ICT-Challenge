<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fields_of_work', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('education_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Pivot: job <-> field_of_work (many-to-many)
        Schema::create('job_field_of_work', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('field_of_work_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('field_of_work_id')->references('id')->on('fields_of_work')->onDelete('cascade');
        });

        // Add province_id and education_level_id columns to jobs
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->nullable()->after('status');
            $table->unsignedBigInteger('education_level_id')->nullable()->after('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
            $table->dropForeign(['education_level_id']);
            $table->dropColumn(['province_id', 'education_level_id']);
        });

        Schema::dropIfExists('job_field_of_work');
        Schema::dropIfExists('education_levels');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('fields_of_work');
    }
};