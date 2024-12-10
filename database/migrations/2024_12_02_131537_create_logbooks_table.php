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
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id(); // Primary key as bigInteger
            $table->unsignedBigInteger('intership_student_id'); // Foreign key reference
            $table->date('date');
            $table->enum('presence', ['hadir', 'izin', 'sakit'])->nullable();
            $table->text('information')->nullable();
            $table->timestamps(); // Optional: add timestamps for created_at and updated_at

            // Set foreign key constraint
            $table->foreign('intership_student_id')->references('id')->on('intership_students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbooks');
    }
};
