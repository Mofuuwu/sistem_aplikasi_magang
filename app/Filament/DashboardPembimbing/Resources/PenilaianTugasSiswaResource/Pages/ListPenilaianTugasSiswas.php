<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianTugasSiswaResource\Pages;

use Filament\Actions;
use App\Models\InternshipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use App\Filament\DashboardPembimbing\Resources\PenilaianTugasSiswaResource;

class ListPenilaianTugasSiswas extends Page
{
    public $internship_students;
    public $ex_internship_students;
    protected static string $view = 'filament.dashboard-pembimbing.resources.penilaian_tugas_siswa_resource.pages.list_penilaian_tugas_siswa';
    protected static string $resource = PenilaianTugasSiswaResource::class;
    protected static ?string $title = 'Penilaian Tugas' ;

    public function mount(): void {
        $this->internship_students = InternshipStudent::where('is_magang', true)->where('mentor_id', Auth::user()->mentor->id)->get();
        $this->ex_internship_students = InternshipStudent::where('is_magang', false)->where('mentor_id', Auth::user()->mentor->id)->get();
    }
    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
