<?php

namespace App\Filament\DashboardAdmin\Resources\AdminUnitResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminUnit extends EditRecord
{
    protected static string $resource = AdminUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
