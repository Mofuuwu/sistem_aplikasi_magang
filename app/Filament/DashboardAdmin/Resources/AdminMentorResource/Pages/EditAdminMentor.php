<?php

namespace App\Filament\DashboardAdmin\Resources\AdminMentorResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminMentorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminMentor extends EditRecord
{
    protected static string $resource = AdminMentorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
