<?php

namespace App\Filament\DashboardPembimbing\Resources;

use App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource\Pages;
use App\Filament\DashboardPembimbing\Resources\PenilaianSikapSiswaResource\RelationManagers;
use App\Models\Evaluation;
use App\Models\PenilaianSikapSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenilaianSikapSiswaResource extends Resource
{
    protected static ?string $navigationGroup = 'Rekap Nilai';
    protected static ?string $model = Evaluation::class;
    protected static ?string $navigationLabel = 'Nilai Sikap';
    protected static ?string $slug = 'penilaian_sikap';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('intership_student_id')
                ->label('Pilih Siswa'),
                Forms\Components\Hidden::make('type')
                ->default('sikap')
                ->dehydrated(),
                Forms\Components\TextInput::make('score')
                ->label('Tentukan Nilai Sikap')
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListPenilaianSikapSiswas::route('/'),
            'create' => Pages\CreatePenilaianSikapSiswa::route('/create'),
            // 'edit' => Pages\EditPenilaianSikapSiswa::route('/{record}/edit'),
            'view' => Pages\ViewPenilaianSikapSiswa::route('/{record}'),
        ];
    }
}
