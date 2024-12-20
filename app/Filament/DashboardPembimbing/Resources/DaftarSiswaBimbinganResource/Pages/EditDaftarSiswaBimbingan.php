<?php

namespace App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;

use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarSiswaBimbingan extends EditRecord
{
    protected static string $resource = DaftarSiswaBimbinganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
