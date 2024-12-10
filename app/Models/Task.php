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
        return $this->belongsTo(Evaluation::class);
    }
    public function intership_student() {
        return $this->belongsTo(IntershipStudent::class, 'intership_student_id');
    }
    public function mentor() {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
