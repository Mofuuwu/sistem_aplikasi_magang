<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Announcement;
use Filament\Resources\Resource;
use App\Models\PengumumanPembimbing;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\Pages;
use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\RelationManagers;
use Filament\Forms\Components\Grid;

class PengumumanPembimbingResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('mentor_id')
                ->default(Auth::user()->mentor->id)
                ->dehydrated(),
                Forms\Components\Textarea::make('content')
                ->label('Isi Pengumuman')
                ->columnSpan(2),
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
                Tables\Columns\TextColumn::make('content')
                ->words(20)
                ->label('Pengumuman')
                ->limit(70),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPengumumanPembimbings::route('/'),
            'create' => Pages\CreatePengumumanPembimbing::route('/create'),
            'edit' => Pages\EditPengumumanPembimbing::route('/{record}/edit'),
            'view' => Pages\ViewPengumumanPembimbing::route('pengumuman/{record}'),
        ];
    }
}
