<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use App\Models\Task;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Evaluation;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\InternshipStudent;
use Illuminate\Support\Facades\Auth;
use App\Filament\DashboardPembimbing\Resources\PenilaianTugasSiswaResource\Pages;
use Filament\Actions\Action;
use Illuminate\Mail\Mailables\Content;

class PenilaianTugasSiswaResource extends Resource
{
    protected static ?string $navigationGroup = 'Rekap Nilai';
    protected static ?string $model = Evaluation::class;

    protected static ?string $navigationIcon = 'heroicon-s-chart-bar';
    protected static ?string $navigationLabel = 'Nilai Tugas';
    protected static ?string $slug = 'penilaian_tugas';

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
                Tables\Columns\TextColumn::make('internship_student.student.user.name')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('task_header')
                    ->label('Tugas'),
                Tables\Columns\BadgeColumn::make('score')
                    ->label('Nilai')
                    ->getStateUsing(function ($record) {
                        return $record->status == 'selesai' ? $record->score === null ? 'Belum Dinilai' : $record->score : 'Belum Selesai';
                    })
                    ->colors([
                        'success' => fn ($state) => is_numeric($state),
                        'danger' => 'Belum Dinilai',
                        'warning' => 'Belum Selesai'
                    ]),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dinilai Pada')
            ])
            ->filters([
                //
            ])
            ->actions([
                
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
            'index' => Pages\ListPenilaianTugasSiswas::route('/'),
            'view_siswa' => Pages\ViewPenilaianTugasSiswa::route('/{record}'),
        ];
    }
}
