<?php

namespace App\Filament\DashboardSiswa\Resources\TugasResource\Pages;

use App\Filament\DashboardSiswa\Resources\TugasResource;
use App\Models\Task;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\Pages\Page;

class ViewTugas extends Page
{
    protected static string $resource = TugasResource::class;
    protected static string $view = 'filament.dashboard-siswa.resources.tugas-resource.pages.viewtugas';
    protected static ?string $title = 'Info Tugas';
    public $task;
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
    public function mount($record)
    {
        $this->task = Task::findOrFail($record);
    }
}
