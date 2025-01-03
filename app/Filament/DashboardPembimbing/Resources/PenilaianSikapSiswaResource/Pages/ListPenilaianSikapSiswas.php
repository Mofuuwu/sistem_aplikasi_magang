<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource\Pages;

use Filament\Actions;
use App\Models\InternshipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource;

class ListPenilaianSikapSiswas extends ListRecords
{
    public $internship_students;
    public $ex_internship_students;
    protected static string $view = 'filament.dashboard-pembimbing.resources.penilaian_sikap_siswa_resource.pages.list_penilaian_sikap_siswa';
    protected static string $resource = PenilaianSikapSiswaResource::class;
    protected static ?string $title = 'Penilaian Sikap';

    public function mount(): void {
        $this->internship_students = InternshipStudent::where('is_magang', true)->where('mentor_id', Auth::user()->mentor->id)->get();
        $this->ex_internship_students = InternshipStudent::where('is_magang', false)->where('mentor_id', Auth::user()->mentor->id)->get();
    }
    // protected function getHeaderActions(): array{
    //     return [
    //         Actions\CreateAction::make('tambahNilaiSikap')
    //         ->label('Tambah Nilai Sikap')
    //     ];
    // }
}
