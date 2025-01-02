<?php

namespace App\Filament\DashboardPembimbing\Resources\PeraturanUnitResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PeraturanUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeraturanUnits extends ListRecords
{
    protected static string $resource = PeraturanUnitResource::class;
    protected static ?string $title = 'Peraturan Unit';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Peraturan'),
        ];
    }
}
