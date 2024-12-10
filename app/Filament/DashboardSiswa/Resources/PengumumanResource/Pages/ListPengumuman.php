<?php

namespace App\Filament\DashboardSiswa\Resources\PengumumanResource\Pages;

use Filament\Actions;
use App\Models\Announcement;
use App\Models\IntershipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use App\Filament\DashboardSiswa\Resources\PengumumanResource;

class ListPengumuman extends Page
{
    public $intership_student;
    public $announcement_comments;
    public $announcements;
    
    protected static string $resource = PengumumanResource::class;
    protected static ?string $title = 'Pengumuman';

    protected static string $view = 'filament.dashboard-siswa.resources.pengumuman-resource.pages.listpengumuman';

    public function mount() {
        $this->intership_student = IntershipStudent::where('student_id', Auth::user()->student->id)->first();
        $this->announcements = Announcement::where('mentor_id', $this->intership_student->mentor_id)->get();
    }
    public function comment() {
        
    }
}
