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
        Schema::create('resume_educations', function (Blueprint $table) {
            $table->id();
            $table->text('summary')->nullable();
            $table->string('course_name', 255);
            $table->string('passing_year', 255);
            $table->string('institute_name', 255);
            $table->string('gpa', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_educations');
    }
};
