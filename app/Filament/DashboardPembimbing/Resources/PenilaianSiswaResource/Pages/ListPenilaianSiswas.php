<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource\Pages;

use Filament\Actions;
use App\Models\IntershipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource;

class ListPenilaianSiswas extends Page
{
    public $intership_students;
    protected static string $view = 'filament.dashboard-pembimbing.resources.penilaian_siswa_resource.pages.list_penilaian_siswa';
    protected static string $resource = PenilaianSiswaResource::class;
    protected static ?string $title = 'Penilaian Siswa' ;

    public function mount(): void {
        $this->intership_students = IntershipStudent::where('mentor_id', Auth::user()->mentor->id)->get();
    }
}
