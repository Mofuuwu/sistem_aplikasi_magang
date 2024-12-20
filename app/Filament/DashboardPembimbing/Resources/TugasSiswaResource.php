<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use App\Models\Task;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\TugasSiswa;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\Pages;
use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\RelationManagers;

class TugasSiswaResource extends Resource
{
    protected static ?string $model = Task::class;
    protected static ?string $slug = 'tugas_siswa';

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
                Tables\Columns\TextColumn::make('task_header')
                ->label('Tugas'),
                Tables\Columns\TextColumn::make('intership_student.student.user.name')
                ->label('Nama Siswa'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(), //masih error belum bisa ngedit
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTugasSiswas::route('/'),
            'create' => Pages\CreateTugasSiswa::route('/create'),
            'edit' => Pages\EditTugasSiswa::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
{
    // Ensure the mentor ID is retrieved from the authenticated user
    $mentorId = Auth::user()->mentor->id;

    // Return the builder instance with the condition for mentor_id if it exists
    return Task::when($mentorId, function (Builder $query) use ($mentorId) {
        return $query->where('mentor_id', $mentorId);
    });
}
}
