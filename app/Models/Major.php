<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    public $timestamps = false;
    public function students() {
        return $this->hasMany(Student::class);
    }
}
