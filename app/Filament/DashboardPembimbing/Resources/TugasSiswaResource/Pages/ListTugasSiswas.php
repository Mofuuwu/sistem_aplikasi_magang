<?php

namespace App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTugasSiswas extends ListRecords
{
    protected static ?string $title = 'Daftar Tugas Siswa';
    protected static string $resource = TugasSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Tugas'),
        ];
    }
}
