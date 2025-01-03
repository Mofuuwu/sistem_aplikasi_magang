<?php

namespace App\Filament\DashboardSiswa\Resources\PengumumanResource\Pages;

use App\Models\Announcement;
use App\Models\InternshipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\Page;
use App\Filament\DashboardSiswa\Resources\PengumumanResource;

class ListPengumuman extends Page
{
    public $internship_student;
    public $announcement_comments;
    public $announcements;
    
    protected static string $resource = PengumumanResource::class;
    protected static ?string $title = 'Pengumuman';

    protected static string $view = 'filament.dashboard-siswa.resources.pengumuman-resource.pages.listpengumuman';

    public function mount() {
        $this->internship_student = InternshipStudent::where('student_id', Auth::user()->student->id)->first();
        $this->announcements = Announcement::where('updated_at', '<', Auth::user()->student->internship_student->end_at)->where('mentor_id', $this->internship_student->mentor_id)->get();
    }
    public function comment() {
        
    }
}
