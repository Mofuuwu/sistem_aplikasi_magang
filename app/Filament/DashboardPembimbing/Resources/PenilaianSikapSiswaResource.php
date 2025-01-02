<?php

namespace App\Filament\DashboardPembimbing\Resources;

use App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource\Pages;
use App\Models\Evaluation;
use App\Models\InternshipStudent;
use App\Models\PenilaianSikapSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PenilaianSikapSiswaResource extends Resource
{
    protected static ?string $navigationGroup = 'Rekap Nilai';
    protected static ?string $model = Evaluation::class;
    protected static ?string $navigationLabel = 'Nilai Sikap';
    protected static ?string $slug = 'penilaian_sikap';
    protected static ?string $navigationIcon = 'heroicon-s-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('internship_student_id')
                ->options(InternshipStudent::where('mentor_id', Auth::user()->mentor->id)
                ->join('students', 'internship_students.student_id', '=', 'students.id')
                ->join('users', 'students.user_id', '=', 'users.id')
                ->pluck('users.name', 'internship_students.id'))   
                ->required()
                ->label('Pilih Siswa'),
                Forms\Components\Hidden::make('type')
                ->default('sikap')
                ->dehydrated(),
                Forms\Components\TextInput::make('score')
                ->label('Tentukan Nilai Sikap')
                ->required()
                ->numeric()
                ->maxValue(100)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('internship_student.student.user.name')
                ->label('Nama Siswa'),
                Tables\Columns\TextColumn::make('score')
                ->label('Nilai'),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Dinilai Pada')
            ])
            ->filters([
                
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenilaianSikapSiswas::route('/'),
            'view_siswa' => Pages\ViewPenilaianSikapSiswa::route('/{record}'),
        ];
    }
}
