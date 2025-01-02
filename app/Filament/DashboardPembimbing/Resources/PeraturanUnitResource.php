<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use App\Models\Rule;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PeraturanUnit;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Contracts\HasTable;
use App\Filament\DashboardPembimbing\Resources\PeraturanUnitResource\Pages;
use App\Filament\DashboardPembimbing\Resources\PeraturanUnitResource\RelationManagers;

class PeraturanUnitResource extends Resource
{
    protected static ?string $model = Rule::class;

    protected static ?string $navigationIcon = 'heroicon-s-shield-check';
    protected static ?string $navigationLabel = 'Peraturan Unit';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                ->label('Tambah Peraturan')
                ->columnSpan(2),
                Forms\Components\Hidden::make('type')
                ->default('unit')
                ->dehydrated(),
                Forms\Components\Hidden::make('work_unit_id')
                ->default(Auth::user()->mentor->work_unit_id)
                ->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('')->state(
                    static function (HasTable $livewire, $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('description')
                ->label('Peraturan')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->label('Hapus'),
            ])
            ->bulkActions([
            ])
            ->modifyQueryUsing(function (Builder $query) {
              return $query->where('type', 'unit')->where('work_unit_id', Auth::user()->mentor->work_unit_id);  
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
            'index' => Pages\ListPeraturanUnits::route('/'),
        ];
    }
}
