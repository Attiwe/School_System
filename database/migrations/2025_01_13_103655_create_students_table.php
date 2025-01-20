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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->constrained('grades')->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('class_roms')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->foreignId('nationalitie_id')->constrained('nationalities')->cascadeOnDelete();
            $table->foreignId('blood_id')->constrained('type_bloods')->cascadeOnDelete();
            $table->foreignId('parents_id')->constrained('my_parents')->cascadeOnDelete();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->date('date_birth');
            $table->string('academic_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
