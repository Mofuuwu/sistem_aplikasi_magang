<?php

namespace App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\Pages;

use Filament\Actions;
use Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource;

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
