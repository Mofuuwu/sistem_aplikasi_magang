<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianKehadiranSiswaResource\Pages;

use Filament\Actions;
use App\Models\InternshipStudent;
use Filament\Resources\Pages\ListRecords;
use App\Filament\DashboardPembimbing\Resources\PenilaianKehadiranSiswaResource;
use Illuminate\Support\Facades\Auth;

class ListPenilaianKehadiranSiswas extends ListRecords
{
    public $internship_students;
    protected static string $view = 'filament.dashboard-pembimbing.resources.penilaian_kehadiran_siswa_resource.pages.list_penilaian_kehadiran_siswa';
    protected static ?string $title = 'Penilaian Kehadiran';
    protected static string $resource = PenilaianKehadiranSiswaResource::class;
    public function mount(): void {
        $this->internship_students = InternshipStudent::where('mentor_id', Auth::user()->mentor->id)->get();
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make()
    //         ->label('Tambah Nilai Kehadiran'),
    //     ];
    // }
}
