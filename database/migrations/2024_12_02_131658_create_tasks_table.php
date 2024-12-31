<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('internship_student_id');
            $table->string('mentor_id');
            $table->string('task_header');
            $table->text('task_description');
            $table->date('start_at');
            $table->date('end_at')->nullable();
            $table->enum('status', ['belum selesai', 'dikerjakan', 'selesai']);
            $table->string('response')->nullable();
            $table->integer('score')->default(null)->nullable()->ma;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
