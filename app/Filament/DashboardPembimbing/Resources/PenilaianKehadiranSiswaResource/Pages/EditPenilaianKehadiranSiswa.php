<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianKehadiranSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianKehadiranSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianKehadiranSiswa extends EditRecord
{
    protected static string $resource = PenilaianKehadiranSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
