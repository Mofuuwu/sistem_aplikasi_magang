<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkUnit extends Model
{
    /** @use HasFactory<\Database\Factories\WorkUnitFactory> */
    use HasFactory, Notifiable;
    protected $guarded = [];
    public $timestamps = false;
    public function placement_location() {
        return $this->belongsTo(PlacementLocation::class, 'placement_location_id');
    }
    public function rules() {
        return $this->hasMany(Rule::class);
    }
    public function mentors(){
        return $this->hasMany(Mentor::class);
    }
    public function intership_students() {
        return $this->hasMany(IntershipStudent::class);
    }
}
