<?php

namespace App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;

use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource;
use App\Models\IntershipStudent;
use App\Models\Logbook;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

    class ViewLogbookSiswa extends Page
{
    public $intership_students;
    public $student;
    public $logbook;
    protected static string $resource = DaftarSiswaBimbinganResource::class;
    protected static ?string $title = 'Logbook Siswa';
    protected static string $view = 'filament.dashboard-pembimbing.resources.list_daftar_bimbingan_resource.pages.view_logbook_siswa';

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
    public function mount($record) {
        $this->student = Student::findOrFail($record);
        $this->logbook = Logbook::where('intership_student_id', $this->student->intership_student->id)->get();
    }
}
