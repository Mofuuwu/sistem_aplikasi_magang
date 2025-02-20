<?php

namespace App\Filament\DashboardAdmin\Resources;

use App\Filament\DashboardAdmin\Resources\AdminUnitRulesResource\Pages;
use App\Filament\DashboardAdmin\Resources\AdminUnitRulesResource\RelationManagers;
use App\Models\AdminUnitRules;
use App\Models\Rule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminUnitRulesResource extends Resource
{
    protected static ?string $model = Rule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Peraturan Unit';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('work_unit.name')
                ->label('Nama Unit')
                ->columnSpan(2),
                Forms\Components\TextInput::make('description')
                ->label('Peraturan')
                ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('work_unit.name')
                ->label('Nama Unit'),
                Tables\Columns\TextColumn::make('description')
                ->label('Peraturan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListAdminUnitRules::route('/'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return Rule::where('type', 'unit');
    }
}
