<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Evaluation;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\InternshipStudent;
use App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource\Pages;

class PenilaianSiswaResource extends Resource
{
    protected static ?string $model = Evaluation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'penilaian_siswa';

    public static function form(Form $form): Form
    {
        $internshipStudentId = request()->route('internship_student_id'); 
        $internshipStudent = InternshipStudent::find($internshipStudentId);
        return $form
            ->schema([
                Forms\Components\Placeholder::make('')
                ->label('Beri Penilaian Untuk '),
                Forms\Components\Hidden::make('internship_student_id')
                ->default($internshipStudent ? $internshipStudent->id : null),
                Forms\Components\Select::make('type')
                ->label('Tipe Penilaian')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('internship_student.student.user.name')
                    ->label('Nama'),
                // ->options(function() {
                //     $students = \App\Models\InternshipStudent::with('student.user') 
                //         ->get()
                //         ->pluck('student.user.name', 'student.id'); 
                //     return $students->toArray();
                // }),
                Tables\Columns\TextColumn::make('type')
                    ->label('Penilaian'),
                Tables\Columns\TextColumn::make('task_id')
                    ->label('Tugas')
                    // ->options(function (): array {
                    //     $internshipStudentId = request()->route('record'); // Ambil ID dari URL
                    //     if (!$internshipStudentId) {
                    //         return [];
                    //     }

                    //     return Task::where('internship_student_id', $internshipStudentId)
                    //         ->pluck('task_header', 'id')
                    //         ->toArray();
                    // }),
                    ,
                Tables\Columns\TextColumn::make('score')
                    ->label('Nilai'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dinilai Pada')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenilaianSiswas::route('/'),
            'create' => Pages\CreatePenilaianSiswa::route('/create'),
            'edit' => Pages\EditPenilaianSiswa::route('/{record}/edit'),
            'penilaian_tugas' => Pages\ViewPenilaianTugas::route('penilaian_tugas/{record}'),
            'penilaian_sikap' => Pages\ViewPenilaianSikap::route('penilaian_sikap/{record}'),
        ];
    }
}
