<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianSiswa extends EditRecord
{
    protected static string $resource = PenilaianSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
