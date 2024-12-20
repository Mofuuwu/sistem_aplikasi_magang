<?php

namespace App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;

use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource;
use App\Models\IntershipStudent;
use App\Models\Student;
use App\Models\Task;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class ViewTugasSiswa extends Page
{
    public $intership_students;
    public $tasks;
    public $student;
    protected static string $resource = DaftarSiswaBimbinganResource::class;
    protected static ?string $title = 'Tugas Siswa';
    protected static string $view = 'filament.dashboard-pembimbing.resources.list_daftar_bimbingan_resource.pages.view_tugas_siswa';

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
        $this->tasks = Task::where('intership_student_id', $this->student->intership_student->id)->where('mentor_id', Auth::user()->mentor->id)->get();
    }
}
