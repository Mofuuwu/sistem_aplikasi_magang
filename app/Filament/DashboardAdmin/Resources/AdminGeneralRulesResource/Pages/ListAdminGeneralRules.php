<?php

namespace App\Filament\DashboardAdmin\Resources\AdminGeneralRulesResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminGeneralRulesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminGeneralRules extends ListRecords
{
    protected static string $resource = AdminGeneralRulesResource::class;
    protected static ?string $title = 'Peraturan Umum';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
