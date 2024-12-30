<?php

namespace App\Filament\DashboardSiswa\Pages;

use App\Models\Rule;
use Filament\Pages\Page;
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
    public $kolomData;
    public function mount()
    {
        if ( Auth::user() && Auth::user()->student) {
            if (Auth::user()->student->is_active == '1') {
                $this->user = User::with('student')->find(Auth::id());
                $this->generalRules = Rule::where('type', 'general')->get();
                $this->unitRules = Rule::where('work_unit_id', $this->user->student->internship_student->work_unit_id)->get();
                $this->kolomData = [
                    'Nama Lengkap' => $this->user->name,
                    'Pembimbing' => $this->user->student->internship_student->mentor->user->name,
                    'Unit' => $this->user->student->internship_student->work_unit->name,
                    'Lokasi' => $this->user->student->internship_student->work_unit->placement_location->name,
                    'Alamat' => $this->user->student->internship_student->work_unit->placement_location->address,
                    'Mulai dari' => $this->user->student->internship_student->start_at,
                    'Selesai pada' => $this->user->student->internship_student->end_at
                ];
            }
        } 
    }
    
}
