<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\DaftarSiswaBimbingan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\Pages;
use App\Filament\DashboardPembimbing\Resources\DaftarSiswaBimbinganResource\RelationManagers;

class DaftarSiswaBimbinganResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationLabel = 'Daftar Siswa Bimbingan';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'daftar_siswa_bimbingan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDaftarSiswaBimbingans::route('/'),
            'create' => Pages\CreateDaftarSiswaBimbingan::route('/create'),
            'edit' => Pages\EditDaftarSiswaBimbingan::route('/{record}/edit'),
            'profil_siswa' => Pages\ViewProfilSiswa::route('/profil_siswa/{record}'),
            'logbook_siswa' => Pages\ViewLogbookSiswa::route('/logbook_siswa/{record}'),
            'tugas_siswa' => Pages\ViewTugasSiswa::route('/tugas_siswa/{record}'),
            // 'tugas_siswa/create_tugas' => Pages\CreateTugasSiswa::route('/tugas_siswa/create_tugas'),
        ];
    }
}
