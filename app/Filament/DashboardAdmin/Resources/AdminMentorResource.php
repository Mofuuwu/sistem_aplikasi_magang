<?php

namespace App\Filament\DashboardAdmin\Resources;

use App\Filament\DashboardAdmin\Resources\AdminMentorResource\Pages;
use App\Filament\DashboardAdmin\Resources\AdminMentorResource\RelationManagers;
use App\Models\AdminMentor;
use App\Models\Mentor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminMentorResource extends Resource
{
    protected static ?string $model = Mentor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                ->options([
                    '-' => 'buat relasi seperti dokumentasi awal filament',
                    '+' => 'dimana kita menambahkan data mentor sekaligus membuat data user',
                    '/' => 'di dalam 1 form saja ( baca ulang tutorial filament )',
                ])
                ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label('Nama'),
                Tables\Columns\TextColumn::make('user.email')
                ->label('Email'),
                Tables\Columns\TextColumn::make('phone_number')
                ->label('Nomor Telepon'),
                Tables\Columns\TextColumn::make('work_unit.name')
                ->label('Unit'),
            ])
            ->filters([
                
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
            'index' => Pages\ListAdminMentors::route('/'),
        ];
    }
}
