<?php

namespace App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;

use Filament\Actions;
use App\Models\Student;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Gate;
use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource;

class ViewProfilSiswa extends Page
{
    public $student;
    protected static string $resource = DaftarSiswaBimbinganResource::class;
    protected static ?string $title = 'Profil Siswa';
    protected static string $view = 'filament.dashboard-pembimbing.resources.list_daftar_bimbingan_resource.pages.view_profil_siswa';

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
    public function mount($record) {
        $this->student = Student::findOrFail($record);
        if (!Gate::allows('mentor-profile-student-policy', $this->student)) {
            abort(403, 'Anda tidak memiliki akses untuk melihat profil siswa ini');
        }
    }
}
