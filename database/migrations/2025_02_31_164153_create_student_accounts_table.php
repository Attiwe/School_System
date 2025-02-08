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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('grade_id')->nullable()->constrained('grades')->cascadeOnDelete();
            $table->foreignId('class_id')->nullable()->constrained('class_roms')->cascadeOnDelete();
            $table->foreignId('fees_invoices_id')->nullable()->constrained('fees_invoices')->cascadeOnDelete();
            $table->foreignId('receipt_id')->nullable()->constrained('receipt_students')->cascadeOnDelete();
            $table->foreignId('processFees_id')->nullable()->constrained('processing_fees')->cascadeOnDelete();
            $table->foreignId('payment_id')->nullable()->constrained('payment_students')->cascadeOnDelete();
            $table->decimal('debit')->nullable();
            $table->decimal('credit')->nullable();
            $table->string('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_accounts');
    }
};
