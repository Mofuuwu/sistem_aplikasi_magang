<?php

namespace App\Filament\DashboardSiswa\Resources\TugasResource\Pages;

use App\Models\Task;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\DashboardSiswa\Resources\TugasResource;

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
        // Ambil task berdasarkan ID
        $task = Task::findOrFail($record);

        // Periksa akses menggunakan Gate
        if (!Gate::allows('student-tasks-policy', $task)) {
            abort(403, 'Anda tidak memiliki akses untuk melihat tugas ini');
        }

        // Set data task ke properti
        $this->task = $task;
    }

}
