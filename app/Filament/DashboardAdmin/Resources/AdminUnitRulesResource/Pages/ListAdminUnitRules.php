<?php

namespace App\Filament\DashboardAdmin\Resources\AdminUnitRulesResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminUnitRulesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminUnitRules extends ListRecords
{
    protected static string $resource = AdminUnitRulesResource::class;
    protected static ?string $title = 'Peraturan Unit';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
