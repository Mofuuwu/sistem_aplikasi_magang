<?php

namespace App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengumumanPembimbings extends ListRecords
{
    protected static string $resource = PengumumanPembimbingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
