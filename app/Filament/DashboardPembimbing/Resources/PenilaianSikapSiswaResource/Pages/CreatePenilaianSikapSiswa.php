<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;

class CreatePenilaianSikapSiswa extends CreateRecord
{
    protected static string $resource = PenilaianSikapSiswaResource::class;

    // public function getFormActions(): array {
    //     return [
    //         CreateAction::make('create')
    //         ->label('Buat')
    //         ->successRedirectUrl('/dashboard_pembimbing/penilaian_sikap')
    //     ];
    // }
    // public function getCreateFormAction(): Actions\Action {
    //     return CreateAction::make('create');
    // }
    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
            ->label('Simpan')
            ->successRedirectUrl(route('filament.dashboard_pembimbing.resources.pengumuman-pembimbings.index'))
        ];
    }
}
