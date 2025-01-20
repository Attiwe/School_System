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
        Schema::create('parent_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('my_parents')->cascadeOnDelete();
            $table->string('first_name')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_attachments');
    }
};
