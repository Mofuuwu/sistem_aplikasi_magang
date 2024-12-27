<?php

namespace App\Filament\DashboardSiswa\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Logbook;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\IntershipStudent;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\DashboardSiswa\Resources\LogbookResource\Pages;
use App\Filament\DashboardSiswa\Resources\LogbookResource\RelationManagers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LogbookResource extends Resource
{
    protected static ?string $model = Logbook::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-chart-bar';
    protected static ?int $navigationSort = 3;
    protected static ?string $pluralModelLabel = 'Logbook Anda';
    protected static ?string $navigationLabel = 'Logbook';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('intership_student_id')
                    ->default(fn () => IntershipStudent::where('student_id', Student::where('user_id', Auth::id())->first()?->id)->first()?->id),
                Forms\Components\DatePicker::make('date')
                ->default(now()->format('Y-m-d')) 
                ->dehydrated(true) 
                ->label('Tanggal'),
                Forms\Components\Select::make('presence')
                ->label('Keterangan')
                ->options([
                    'hadir' => 'Hadir',
                    'izin' => 'Izin',
                    'sakit' => 'Sakit',
                ]),
                Forms\Components\TextInput::make('information')
                ->label('Tambahan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                ->label('Tanggal')
                ->searchable(),
                Tables\Columns\SelectColumn::make('presence')
                ->options([
                    'sakit' => 'Sakit',
                    'izin' => 'Izin',
                    'hadir' => 'Hadir',
                ])->placeholder('Pilih Presensi')
                ->label('Keterangan'),
                Tables\Columns\TextInputColumn::make('information')
                ->label('Tambahan'),
                

            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->where('intership_student_id', Auth::user()->student->intership_student->id)->orderBy('date', 'desc'))
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Edit'),
                Tables\Actions\DeleteAction::make()
                ->label('Hapus')
            ])
            ->bulkActions([
            ])
            ->searchPlaceholder('Cari tanggal');
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
            'index' => Pages\ListLogbooks::route('/'),
            'edit' => Pages\EditLogbook::route('/{record}/edit'),
        ];
    }
    public static function canAccess(): bool
    {
        return Auth::user() && Auth::user()->student && Auth::user()->student->is_active == '1';
    }
    
}
