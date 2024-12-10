<?php

namespace App\Filament\DashboardSiswa\Resources;

use Filament\Forms;
use App\Models\Task;
use Filament\Tables;

use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\DashboardSiswa\Resources\TugasResource\Pages;
use App\Filament\DashboardSiswa\Resources\TugasResource\RelationManagers;
use App\Models\IntershipStudent;

class TugasResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-s-square-3-stack-3d';
    protected static ?string $navigationLabel = 'Tugas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('task_header')
                ->label('Tugas')
                ->disabled(),
                Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'belum selesai' => 'Belum Selesai',
                    'selesai' => 'Selesai',
                ])
                ->default('belum selesai')
                ->disablePlaceholderSelection(),
                Forms\Components\Textarea::make('task_description')
                ->label('Deskripsi')
                ->visibleOn(['view', 'edit'])
                ->disabled()
                ->columnSpan(2),
                Forms\Components\DatePicker::make('start_at')
                ->label('Dimulai')
                ->disabled(),
                Forms\Components\DatePicker::make('end_at')
                ->label('Tenggat')
                ->disabled(),
                Forms\Components\Textarea::make('response')
                ->label('Jawaban')
                ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('task_header')
                ->label('Tugas'),
                Tables\Columns\TextColumn::make('task_description')
                ->label('Deskripsi Tugas')
                ->visibleOn('view'),
                Tables\Columns\TextColumn::make('start_at')
                ->label('Dimulai'),
                Tables\Columns\TextColumn::make('end_at')
                ->label('Tenggat'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label('Lihat'),
                Tables\Actions\EditAction::make()
                ->label('Kirim Jawaban')
            ])
            ->bulkActions([
                
            ])
            ->modifyQueryUsing(function(Builder $query) {
                $user = Auth::user();
                $student = Student::where('user_id', $user->id)->first();
                $intershipStudent = IntershipStudent::where('student_id', $student->id)->first();
                $query->where('intership_student_id', $intershipStudent->id);
                return $query;
            })
            ;
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
            'index' => Pages\ListTugas::route('/'),
            'create' => Pages\CreateTugas::route('/create'),
            'edit' => Pages\EditTugas::route('/{record}/edit'),
        ];
    }
}
