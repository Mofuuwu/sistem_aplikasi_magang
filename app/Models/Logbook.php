<?php

namespace App\Models;

use Database\Factories\LogbookFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logbook extends Model
{
    /** @use HasFactory<LogbookFactory> */
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $guarded = [];
    public function internship_student() {
        return $this->belongsTo(InternshipStudent::class, 'internship_student_id');
    }
}
