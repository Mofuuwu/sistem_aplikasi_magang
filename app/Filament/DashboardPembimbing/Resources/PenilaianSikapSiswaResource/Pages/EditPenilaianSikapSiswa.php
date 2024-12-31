<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianSikapSiswa extends EditRecord
{
    protected static string $resource = PenilaianSikapSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
