<?php

namespace App\Filament\DashboardSiswa\Resources\LogbookResource\Pages;

use Filament\Actions;
use App\Models\Student;
use App\Models\IntershipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use App\Filament\DashboardSiswa\Resources\LogbookResource;
use App\Models\Logbook;

class ListLogbooks extends ListRecords
{
    protected static string $resource = LogbookResource::class;

    public function downloadPDF()
    {
        $studentData = Student::where('user_id', Auth::id())->first();
        $intershipStudentData = IntershipStudent::where('student_id', $studentData->id)->first();
        $logbooks = Logbook::where('intership_student_id', $intershipStudentData->id)->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.logbooks', compact('logbooks'));
        return response()->streamDownload(fn () => print($pdf->output()), 'logbooks.pdf');
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('createLogbook')
            ->label('Tambah Logbook')
            ->action(function() {
                $studentData = Student::where('user_id', Auth::id())->first();
                $intershipStudentData = IntershipStudent::where('student_id', $studentData->id)->first();
                $logbookData = [
                    'intership_student_id' => $intershipStudentData->id,
                    'date' => now(),
                ];
                Logbook::create($logbookData);
            }),
            Actions\Action::make('Download PDF')
            ->label('Download PDF')
            ->action('downloadPDF')
            ->color('primary')
            ->requiresConfirmation()
            ->tooltip('Download logbook as PDF'),
        ];
    }
}
