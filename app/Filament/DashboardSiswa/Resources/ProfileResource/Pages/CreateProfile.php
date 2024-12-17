<?php

namespace App\Filament\DashboardSiswa\Resources\ProfileResource\Pages;

use App\Filament\DashboardSiswa\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;

class CreateProfile extends Page
{
    protected static string $resource = ProfileResource::class;
    protected static string $view = 'filament.dashboard-siswa.resources.profile-resource.pages.createprofile';
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
