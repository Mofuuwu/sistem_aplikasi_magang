<?php

namespace App\Filament\DashboardAdmin\Resources;

use Filament\Forms;
use App\Models\Rule;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\AdminGeneralRules;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\DashboardAdmin\Resources\AdminGeneralRulesResource\Pages;
use App\Filament\DashboardAdmin\Resources\AdminGeneralRulesResource\RelationManagers;

class AdminGeneralRulesResource extends Resource
{
    protected static ?string $model = Rule::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Peraturan Umum';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                ->label('Peraturan')
                ->columnSpan(2),
                Forms\Components\Hidden::make('type')
                ->default('general')
                ->dehydrated()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //tambahkan nomor
                Tables\Columns\TextColumn::make('description')
                ->label('Peraturan')
            ])
            ->filters([
                //
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
            'index' => Pages\ListAdminGeneralRules::route('/'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'general');
    }
}
