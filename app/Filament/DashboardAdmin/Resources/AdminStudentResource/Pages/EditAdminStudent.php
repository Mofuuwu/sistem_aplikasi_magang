<?php

namespace App\Filament\DashboardAdmin\Resources\AdminStudentResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminStudent extends EditRecord
{
    protected static string $resource = AdminStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
