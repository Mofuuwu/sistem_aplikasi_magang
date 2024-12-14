<?php

namespace App\Filament\DashboardSiswa\Resources;

use App\Filament\DashboardSiswa\Resources\PengumumanResource\Pages;
use App\Filament\DashboardSiswa\Resources\PengumumanResource\RelationManagers;
use App\Models\Announcement;
use App\Models\Pengumuman;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PengumumanResource extends Resource
{
    protected static ?string $model = Announcement::class;
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-s-megaphone';
    protected static ?string $slug = 'pengumuman';
    protected static ?string $navigationLabel = 'Pengumuman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('created_at')
                ->columnSpan(1)->disabled()->inlineLabel()->disableLabel(),
                Forms\Components\Textarea::make('content')
                ->columnSpan(2)->disabled(),
                Forms\Components\Placeholder::make('comment')->label('Semua Komentar')
                ->columnSpan(2),
                Forms\Components\Textarea::make('comment.content')
                ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at'),
                Tables\Columns\TextColumn::make('content'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                ->label('Komentar'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(function(Builder $query) {
                return $query->where('mentor_id', Auth::user()->student->intership_student->mentor->id);
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
            'index' => Pages\ListPengumuman::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
            'view' => Pages\ViewPengumuman::route('/{record}'),
        ];
    }
}
