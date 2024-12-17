<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        return $student? asset('storage/profile_photos/' . $student->profile_photo) : $this->avatar_url;
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
        return $this->belongsTo(Mentor::class);
    }
    public function role() {
        return $this->belongsTo(ROle::class, 'role_id');
    }
    public function comments()
    {
        return $this->hasMany(AnnouncementComments::class); // Mengindikasikan seorang pengguna bisa memiliki banyak komentar
    }
}
