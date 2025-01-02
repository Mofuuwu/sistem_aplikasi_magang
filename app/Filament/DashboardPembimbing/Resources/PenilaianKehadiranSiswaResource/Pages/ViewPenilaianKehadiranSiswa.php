<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianKehadiranSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianKehadiranSiswaResource;
use App\Models\Evaluation;
use App\Models\Task;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;

    class ViewPenilaianKehadiranSiswa extends ListRecords {
    protected static string $resource = PenilaianKehadiranSiswaResource::class;
    protected static ?string $title = 'Rekap Penilaian Kehadiran Siswa' ;

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
        $studentId = request()->route('record'); 
        if (!$studentId) {
            return Evaluation::query()->whereRaw('1 = 0'); 
        }
        return Evaluation::query()
            ->whereHas('internship_student', function ($query) use ($studentId) {
                $query->where('type', 'kehadiran')->where('id', $studentId);;
            });
    }
}
