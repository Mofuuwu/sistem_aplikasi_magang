<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

    class ViewAllPenilaianSiswa extends ListRecords {
    protected static string $resource = PenilaianSiswaResource::class;
    protected static ?string $title = 'Penilaian Siswa - Kategori : semua penilaian' ;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
}
