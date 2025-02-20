<?php

namespace App\Filament\DashboardAdmin\Resources\AdminUnitResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminUnits extends ListRecords
{
    protected static string $resource = AdminUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
