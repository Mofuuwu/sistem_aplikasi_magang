<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementComments extends Model
{
    /** @use HasFactory<\Database\Factories\AnnouncementCommentsFactory> */
    protected $guarded = [];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class); // Mengasumsikan komentar dimiliki oleh seorang pengguna
    }

    // Relasi ke model Announcement
    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
