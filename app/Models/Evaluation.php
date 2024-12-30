<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    public $timestamps = false;
    public function internship_student() {
        //1 nilai hanya untuk 1 siswa, siswa dapat memiliki banyak nilai
        return $this->belongsTo(InternshipStudent::class, 'internship_student_id');
    }
    public function task() {
        // opsional tergantung tipe penilaian, 1 nilai hanya untuk 1 tugas dan 1 tugas memiliki 1 nilai
        return $this->belongsTo(Task::class, 'task_id');
    }
}
