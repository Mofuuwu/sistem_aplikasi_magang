<?php

namespace App\Filament\DashboardAdmin\Resources\AdminGeneralRulesResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminGeneralRulesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminGeneralRules extends EditRecord
{
    protected static string $resource = AdminGeneralRulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
