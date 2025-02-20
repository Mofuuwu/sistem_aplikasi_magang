<?php

namespace App\Filament\DashboardAdmin\Resources\AdminStudentResource\Pages;

use App\Filament\DashboardAdmin\Resources\AdminStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminStudents extends ListRecords
{
    protected static string $resource = AdminStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
