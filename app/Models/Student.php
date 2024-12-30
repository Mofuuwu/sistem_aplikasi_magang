<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory, Notifiable;
    protected $guarded = [];
    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }
    public function major() {
        return $this->belongsTo(Major::class, 'major_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function internship_student() {
        return $this->hasOne(InternshipStudent::class, 'student_id');
    }
}
