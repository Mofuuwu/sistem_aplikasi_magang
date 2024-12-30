<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InternshipReport extends Model
{
    
    use HasFactory, Notifiable;
    protected $guarded = [];
    public function internship_student() {
        return $this->belongsTo(InternshipStudent::class, 'internship_student_id' );
    }
}
