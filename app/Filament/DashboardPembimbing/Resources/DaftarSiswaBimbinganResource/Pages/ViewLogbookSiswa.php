<?php

namespace App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;


use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource;

    class ViewLogbookSiswa extends ListRecords {
    protected static string $resource = DaftarSiswaBimbinganResource::class;
    protected static ?string $title = 'Logbook Siswa' ;

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
