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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('from_grade')->constrained('grades')->cascadeOnDelete();
            $table->foreignId('from_class')->constrained('class_roms')->cascadeOnDelete();
            $table->foreignId('from_sectian')->constrained('sections')->cascadeOnDelete();
            $table->foreignId('to_grade')->constrained('grades')->cascadeOnDelete();
            $table->foreignId('to_class')->constrained('class_roms')->cascadeOnDelete();
            $table->foreignId('to_sectian')->constrained('sections')->cascadeOnDelete();
            $table->string('academic_year');
            $table->string('new_academic_year');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
