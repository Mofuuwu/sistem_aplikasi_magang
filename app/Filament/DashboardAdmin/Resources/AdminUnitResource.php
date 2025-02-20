<?php

namespace App\Filament\DashboardAdmin\Resources;

use App\Filament\DashboardAdmin\Resources\AdminUnitResource\Pages;
use App\Filament\DashboardAdmin\Resources\AdminUnitResource\RelationManagers;
use App\Models\AdminUnit;
use App\Models\WorkUnit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminUnitResource extends Resource
{
    protected static ?string $model = WorkUnit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            'index' => Pages\ListAdminUnits::route('/'),
            'create' => Pages\CreateAdminUnit::route('/create'),
            'edit' => Pages\EditAdminUnit::route('/{record}/edit'),
        ];
    }
}
