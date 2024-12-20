<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use App\Models\Task;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\TugasSiswa;
use Filament\Tables\Table;
use App\Models\IntershipStudent;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\Pages;
use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\RelationManagers;

class TugasSiswaResource extends Resource
{
    protected static ?string $model = Task::class;
    protected static ?string $slug = 'tugas_siswa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Tugas Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('intership_student_id')
                ->label('Pilih Siswa')
                ->options(
                    IntershipStudent::where('mentor_id', Auth::user()->mentor->id)
                        ->with('student.user') // Pastikan untuk eager load relasi
                        ->get()
                        ->pluck('student.user.name', 'id') // Ambil 'name' dari relasi user dan id sebagai value
                )
                ->columnSpan(2)
                ->searchable()
                ->required(),
                Forms\Components\Hidden::make('mentor_id')
                ->default(Auth::user()->mentor->id)
                ->dehydrated(),
                Forms\Components\TextInput::make('task_header')
                ->label('Judul Tugas')
                ->columnSpan(2)
                ->required(),
                Forms\Components\RichEditor::make('task_description')
                ->label('Panduan Tugas')
                ->columnSpan(2)
                ->toolbarButtons([
                    'bold', 
                    'italic', 
                    'underline', 
                    'strike', 
                    'link', 
                    'h2',
                    'h3',
                    'blockquote', 
                    'codeBlock', 
                    'bulletList',
                    'orderedList', 
                    'undo', 
                    'redo', 
                    ''
                ])
                ->required(),
                Forms\Components\Hidden::make('start_at')
                ->default(now())
                ->dehydrated(),
                Forms\Components\DatePicker::make('end_at')
                ->label('Tenggat') 
                ->nullable() 
                ->reactive() 
                ->dehydrated() 
                ->required(fn ($get) => $get('end_at') !== null) 
                ->helperText('Jika tidak ada tenggat, biarkan kosong.')
                ->columnSpan(2),
                Forms\Components\Hidden::make('status')
                ->default('belum selesai')
                ->dehydrated(),
                Forms\Components\Textarea::make('response')
                ->label('Jawaban')
                ->columnSpan(2)
                ->visibleOn('edit')
                ->default(null)
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
                Tables\Columns\TextColumn::make('intership_student.student.user.name')
                ->label('Nama Siswa'),
                Tables\Columns\TextColumn::make('task_header')
                ->label('Tugas'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(), 
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
