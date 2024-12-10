<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory, Notifiable;
    protected $guarded = [];
    public $timestamps = false;
    public function students() {
        return $this->hasMany(Student::class);
    }
}
