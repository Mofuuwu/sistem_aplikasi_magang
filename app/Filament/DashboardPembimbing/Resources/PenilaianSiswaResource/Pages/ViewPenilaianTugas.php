<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource;
use App\Models\Evaluation;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;

    class ViewPenilaianTugas extends ListRecords {
    protected static string $resource = PenilaianSiswaResource::class;
    protected static ?string $title = 'Penilaian Tugas Siswa' ;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder|null {
        // Ambil ID siswa dari parameter URL
        $studentId = request()->route('record'); 
    
        // Jika ID siswa tidak ada, kembalikan query kosong
        if (!$studentId) {
            return Evaluation::query()->whereRaw('1 = 0'); // Tidak menampilkan data
        }
    
        // Filter data berdasarkan mentor, type = "tugas", dan ID siswa dari URL
        return Evaluation::query()
            ->whereHas('internship_student', function ($query) use ($studentId) {
                $query->where('mentor_id', Auth::user()->mentor->id)
                      ->where('id', $studentId);
            })
            ->where('type', 'tugas');
    }
}
