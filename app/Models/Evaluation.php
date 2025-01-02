<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    public $timestamps = true;
    public function internship_student() {
        return $this->belongsTo(InternshipStudent::class, 'internship_student_id');
    }
}
