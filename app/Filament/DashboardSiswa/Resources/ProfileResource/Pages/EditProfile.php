<?php

namespace App\Filament\DashboardSiswa\Resources\ProfileResource\Pages;

use App\Filament\DashboardSiswa\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;

class EditProfile extends Page
{
    protected static string $resource = ProfileResource::class;
    protected static string $view = 'filament.dashboard-siswa.resources.profile-resource.pages.editprofile';

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
