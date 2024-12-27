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
use App\Models\Logbook;

class DaftarSiswaBimbinganResource extends Resource
{
    protected static ?string $model = Logbook::class;
    protected static ?string $navigationLabel = 'Daftar Siswa Bimbingan';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'daftar_siswa_bimbingan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                ->label('Tanggal'),
                Tables\Columns\TextColumn::make('presence')
                ->label('Keterangan')
                ->badge()
                ->color(fn (string $state = null): string => match ($state) {
                    'sakit' => 'danger',
                    'izin' => 'warning',
                    'hadir' => 'success',
                    default => 'info',
                })
                ->default('belum diisi'),
                Tables\Columns\TextColumn::make('information')
                ->label('Tambahan')
                ->default('tidak ada'),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $intershipStudentId = request()->route('record'); 
                $query->where('intership_student_id', $intershipStudentId)
                ->orderBy('date', 'desc');
            });
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
