<?php

namespace App\Filament\DashboardSiswa\Resources\LogbookResource\Pages;

use App\Filament\DashboardSiswa\Resources\LogbookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogbook extends EditRecord
{
   
    protected static string $resource = LogbookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back') 
            ->label('Kembali') 
            ->url(fn () => static::getResource()::getUrl('index')) 
            ->color('info'),
            // ->icon('heroicon-o-arrow-left'), 
            Actions\DeleteAction::make(),
        ];
    }
}
