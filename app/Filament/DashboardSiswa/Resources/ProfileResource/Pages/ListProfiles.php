<?php

namespace App\Filament\DashboardSiswa\Resources\ProfileResource\Pages;

use App\Models\User;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Filament\DashboardSiswa\Resources\ProfileResource;

class ListProfiles extends Page
{
    public $user;
    public $student;
    protected static ?string $title = 'Profil Anda';
    protected static string $resource = ProfileResource::class;
    protected static string $view = 'filament.dashboard-siswa.resources.profile-resource.pages.listprofile';

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
    public function mount()
    {
        $this->user = User::with('student')->find(Auth::id());
        $this->student = $this->user->student;
    }
}
