<?php

namespace App\Filament\DashboardAdmin\Resources\AdminUnitRulesResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminUnitRulesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminUnitRules extends EditRecord
{
    protected static string $resource = AdminUnitRulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
