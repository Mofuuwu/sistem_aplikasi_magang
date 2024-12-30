<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory, Notifiable;
    protected $guarded = [];
    public function evaluation() {
        return $this->hasOne(Evaluation::class, 'task_id');
    }
    public function internship_student() {
        return $this->belongsTo(InternshipStudent::class, 'internship_student_id');
    }
    public function mentor() {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
