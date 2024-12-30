<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(AnnouncementComments::class); 
    }
}
