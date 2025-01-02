<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Evaluation;
use Filament\Tables\Table;
use App\Models\TambahEvaluasi;
use Filament\Resources\Resource;
use App\Models\InternshipStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\DashboardPembimbing\Resources\TambahEvaluasiResource\Pages;
use App\Filament\DashboardPembimbing\Resources\TambahEvaluasiResource\RelationManagers;

class TambahEvaluasiResource extends Resource
{
    protected static ?string $model = Evaluation::class;
    protected static ?string $navigationLabel = 'Tambah Nilai';
    protected static ?int $navigationSort = 7;

    protected static ?string $slug = 'tambah_nilai';
    protected static ?string $navigationIcon = 'heroicon-s-plus-circle';

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
            ->label('Pilih Siswa')
            ->columnSpan(2),
            Forms\Components\Hidden::make('mentor_id')
            ->default(Auth::user()->mentor->id)
            ->dehydrated(),
            Forms\Components\Select::make('type')
            ->options([
                'sikap' => 'Sikap',
                'kehadiran' => 'Kehadiran',
            ])
            ->required(),
            Forms\Components\TextInput::make('score')
            ->label('Tentukan Nilai')
            ->required()
            ->numeric()
            ->maxValue(100),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('internship_student.student.user.name')
                ->label('Nama Siswa')
                ->searchable(),
                Tables\Columns\TextColumn::make('type')
                ->label('Tipe Penilaian'),
                Tables\Columns\TextColumn::make('score')
                ->label('Nilai'),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Dinilai Pada') 
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ])
            ->searchable();
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
            'index' => Pages\ListTambahEvaluasis::route('/'),
            // 'create' => Pages\CreateTambahEvaluasi::route('/create'),
            // 'edit' => Pages\EditTambahEvaluasi::route('/{record}/edit'),
        ];
    }
}
