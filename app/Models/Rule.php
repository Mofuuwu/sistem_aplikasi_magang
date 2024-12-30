<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rule extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    public $timestamps = false;
    public function work_unit() {
        return $this->belongsTo(WorkUnit::class, 'work_unit_id');
    }
}
