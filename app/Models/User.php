<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements  HasAvatar
{
    public function getFilamentAvatarUrl(): ?string
    {
        $student = Auth::user()->student;
        return $student? asset('storage/profile_photos/' . $student->profile_photo) : 'https://cdn-icons-png.flaticon.com/512/3541/3541871.png';
    }
    
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function student() {
        return $this->hasOne(Student::class, 'user_id');
    }
    public function mentor() {
        return $this->hasOne(Mentor::class, 'user_id');
    }
    public function role() {
        return $this->belongsTo(ROle::class, 'role_id');
    }
    public function comments()
    {
        return $this->hasMany(AnnouncementComments::class); // Mengindikasikan seorang pengguna bisa memiliki banyak komentar
    }
}
