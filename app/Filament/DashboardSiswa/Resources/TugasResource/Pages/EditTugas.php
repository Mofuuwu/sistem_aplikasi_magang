<?php

namespace App\Filament\DashboardSiswa\Resources\TugasResource\Pages;

use App\Filament\DashboardSiswa\Resources\TugasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTugas extends EditRecord
{

    protected static string $resource = TugasResource::class;
    protected static ?string $title = 'Kirim Tugas';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
