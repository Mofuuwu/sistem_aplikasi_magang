<?php

namespace App\Filament\DashboardPembimbing\Resources\TambahEvaluasiResource\Pages;

use App\Filament\DashboardPembimbing\Resources\TambahEvaluasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTambahEvaluasi extends EditRecord
{
    protected static string $resource = TambahEvaluasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
