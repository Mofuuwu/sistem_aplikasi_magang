<?php

namespace App\Filament\DashboardSiswa\Pages;

use App\Models\Rule;
use App\Models\Student;
use Filament\Pages\Page;
use App\Models\IntershipStudent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Siswa_DataMagang extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';
    protected static string $view = 'filament.dashboard-siswa.pages.siswa-data-magang';
    protected static ?string $navigationLabel = 'Data Magang';
    protected static ?string $title = 'Data Magang Anda';

    public $user;
    public $dataSiswa;
    // public $work_unit;
    public $generalRules;
    public $unitRules;
    public function mount()
    {
        $this->user = User::with('student')->find(Auth::id());
        // $this->dataMagangSiswa = $this->dataSiswa 
        //     ? IntershipStudent::where('student_id', $this->dataSiswa->id)->first() 
        //     : null;
        // $this->work_unit = $this->dataMagangSiswa->work_unit_id;

        $this->generalRules = Rule::where('type', 'general')->get();
        $this->unitRules = Rule::where('work_unit_id', $this->user->student->intership_student->work_unit_id)->get();
    }
    
}
