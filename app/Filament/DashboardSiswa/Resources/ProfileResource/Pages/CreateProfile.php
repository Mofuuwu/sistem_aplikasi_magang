<?php

namespace App\Filament\DashboardSiswa\Resources\ProfileResource\Pages;

use App\Filament\DashboardSiswa\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;
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
