<?php

namespace App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;

use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource;
use App\Models\InternshipStudent;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class ListDaftarSiswaBimbingans extends Page
{
    public $internship_students;
    public $ex_internship_students;
    protected static string $resource = DaftarSiswaBimbinganResource::class;
    protected static ?string $title = 'Daftar Siswa Bimbingan';
    protected static string $view = 'filament.dashboard-pembimbing.resources.list_daftar_bimbingan_resource.pages.list_daftar_bimbingan';

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
    public function mount() {
        $this->internship_students = InternshipStudent::where('is_magang', true)->where('mentor_id', Auth::user()->mentor->id)->get();
        $this->ex_internship_students = InternshipStudent::where('is_magang', false)->where('mentor_id', Auth::user()->mentor->id)->get();
    }
}
