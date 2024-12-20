<?php

namespace App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;

use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource;
use App\Models\IntershipStudent;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class ListDaftarSiswaBimbingans extends Page
{
    public $intership_students;
    protected static string $resource = DaftarSiswaBimbinganResource::class;
    protected static ?string $title = 'Daftar Siswa Bimbingan';
    protected static string $view = 'filament.dashboard-pembimbing.resources.list_daftar_bimbingan_resource.pages.list_daftar_bimbingan';

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
    public function mount() {
        $this->intership_students = IntershipStudent::where('mentor_id', Auth::user()->mentor->id)->get();
    }
}
