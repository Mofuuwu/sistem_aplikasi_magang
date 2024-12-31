<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianTugasSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianTugasSiswaResource;
use App\Models\Evaluation;
use App\Models\Task;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;

    class ViewPenilaianTugasSiswa extends ListRecords {
    protected static string $resource = PenilaianTugasSiswaResource::class;
    protected static ?string $title = 'Rekap Penilaian Tugas Siswa' ;

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
            return Task::query()->whereRaw('1 = 0'); 
        }
        return Task::query()
            ->whereHas('internship_student', function ($query) use ($studentId) {
                $query->where('mentor_id', Auth::user()->mentor->id)
                      ->where('id', $studentId);
            });
    }
}
