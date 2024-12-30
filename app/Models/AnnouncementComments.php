<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementComments extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Mengasumsikan komentar dimiliki oleh seorang pengguna
    }

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
