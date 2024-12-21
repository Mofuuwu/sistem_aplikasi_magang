<?php

namespace App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTugasSiswa extends EditRecord
{
    protected static string $resource = TugasSiswaResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hapus Tugas'),
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
            ->label('Simpan')
        ];
    }
}
