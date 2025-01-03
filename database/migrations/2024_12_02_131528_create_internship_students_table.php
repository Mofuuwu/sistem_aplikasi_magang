<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('internship_students', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('mentor_id'); 
            $table->unsignedBigInteger('work_unit_id'); 
            $table->boolean('is_magang')->default(true); 
            $table->date('start_at');
            $table->date('end_at');
            $table->timestamps(); 
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
