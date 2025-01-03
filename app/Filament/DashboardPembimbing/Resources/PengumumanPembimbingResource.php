<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Announcement;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\Pages;

class PengumumanPembimbingResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-s-bell-alert';
    protected static ?string $navigationLabel = 'Pengumuman';
    protected static ?int $navigationSort = 4;

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
                Tables\Actions\DeleteAction::make()
                ->label('Hapus'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                ->label('Komentar'),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->where('mentor_id', Auth::user()->mentor->id));
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
            'view' => Pages\ViewPengumumanPembimbing::route('pengumuman/{record}'),
        ];
    }
    
}
