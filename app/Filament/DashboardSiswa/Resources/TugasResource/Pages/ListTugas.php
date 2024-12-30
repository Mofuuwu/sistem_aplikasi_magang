<?php

namespace App\Filament\DashboardSiswa\Resources\TugasResource\Pages;

use App\Models\Task;
use App\Models\Student;
use App\Models\InternshipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\DashboardSiswa\Resources\TugasResource;

class ListTugas extends ListRecords
{
    protected static string $resource = TugasResource::class;
    protected static ?string $title = 'Tugas Anda';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'Ditugaskan' => Tab::make('Ditugaskan')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('status', 'belum selesai');
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    $user = Auth::user();
                    $student = Student::where('user_id', $user->id)->first();
                    $internshipStudent = InternshipStudent::where('student_id', $student->id)->first();
                    return Task::where('internship_student_id', $internshipStudent->id)->where('status', 'belum selesai')->count();
                }
            )
            ->badgeColor('warning'),
            'Selesai' => Tab::make('Selesai')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('status', 'selesai');
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    $user = Auth::user();
                    $student = Student::where('user_id', $user->id)->first();
                    $internshipStudent = InternshipStudent::where('student_id', $student->id)->first();
                    return Task::where('internship_student_id', $internshipStudent->id)->where('status', 'selesai')->count();
                }
            )
            ->badgeColor('success'),
        ];
    }
}
