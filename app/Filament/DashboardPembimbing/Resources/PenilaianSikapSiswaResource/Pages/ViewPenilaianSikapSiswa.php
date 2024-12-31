<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource;
use App\Models\Evaluation;
use App\Models\Task;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;

    class ViewPenilaianSikapSiswa extends ListRecords {
    protected static string $resource = PenilaianSikapSiswaResource::class;
    protected static ?string $title = 'Rekap Penilaian Sikap Siswa' ;

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
                $query->where('type', 'sikap');
            });
    }
    public static function getPages(): array
    {
        return [
            // 'index' => Pages\ListPenilaianSikapSiswas::route('/'),
            // 'create' => Pages\CreatePenilaianSikapSiswa::route('/create'),
            // 'edit' => Pages\EditPenilaianSikapSiswa::route('/{record}/edit'),
            // 'view' => Pages\ViewPenilaianSikapSiswa::route('/{record}'),
        ];
    }
}
