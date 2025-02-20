<?php

namespace App\Filament\DashboardAdmin\Resources;

use App\Filament\DashboardAdmin\Resources\AdminStudentResource\Pages;
use App\Filament\DashboardAdmin\Resources\AdminStudentResource\RelationManagers;
use App\Models\AdminStudent;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminStudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Tables\Columns\TextColumn::make('user.name')
                ->label('Nama')
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAdminStudents::route('/'),
            'create' => Pages\CreateAdminStudent::route('/create'),
            'edit' => Pages\EditAdminStudent::route('/{record}/edit'),
        ];
    }
}
