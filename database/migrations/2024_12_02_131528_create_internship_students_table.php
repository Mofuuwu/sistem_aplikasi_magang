<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('internship_students', function (Blueprint $table) {
            $table->id(); // Primary key as bigInteger
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('mentor_id'); // Ensure this references another table
            $table->unsignedBigInteger('work_unit_id'); // Ensure this references another table
            $table->date('start_at');
            $table->date('end_at');
            $table->timestamps(); // Optional: add timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_students');
    }
};
