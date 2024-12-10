<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class IntershipReport extends Model
{
    /** @use HasFactory<\Database\Factories\IntershipReportFactory> */
    use HasFactory, Notifiable;
    protected $guarded = [];
    public function intership_student() {
        return $this->belongsTo(IntershipStudent::class, 'intership_student_id' );
    }
}
