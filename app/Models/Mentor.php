<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Model
{
    /** @use HasFactory<\Database\Factories\MentorFactory> */
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function work_unit() {
        return $this->belongsTo(WorkUnit::class, 'work_unit_id');
    }
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    public function intership_students() {
        return $this->hasMany(IntershipStudent::class, 'mentor_id');
    }
}
