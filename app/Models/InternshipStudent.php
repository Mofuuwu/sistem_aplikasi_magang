<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternshipStudent extends Model
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $guarded = [];
    public function logbooks() {
        return $this->hasMany(Logbook::class);
    }
    public function internship_report() {
        return $this->belongsTo(InternshipReport::class);
    }
    public function work_unit() {
        return $this->belongsTo(WorkUnit::class, 'work_unit_id');
    }
    public function mentor() {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    public function evaluations() {
        return $this->hasMany(Evaluation::class);
    }
}
