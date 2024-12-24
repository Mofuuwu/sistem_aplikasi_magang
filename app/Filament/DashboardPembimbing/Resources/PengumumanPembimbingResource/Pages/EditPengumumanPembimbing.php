<?php

namespace App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengumumanPembimbing extends EditRecord
{
    protected static string $resource = PengumumanPembimbingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
}
