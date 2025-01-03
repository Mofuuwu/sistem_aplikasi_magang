<?php

namespace App\Filament\DashboardPembimbing\Resources;

use Filament\Forms;
use App\Models\Task;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\InternshipStudent;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\Pages;
use Filament\Forms\Get;

class TugasSiswaResource extends Resource
{
    protected static ?string $model = Task::class;
    protected static ?string $slug = 'tugas_siswa';

    protected static ?string $navigationIcon = 'heroicon-s-square-3-stack-3d';
    protected static ?string $navigationLabel = 'Tugas Siswa';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('internship_student_id')
                ->label('Pilih Siswa')
                ->options(
                    InternshipStudent::where('is_magang', true)->where('mentor_id', Auth::user()->mentor->id)
                        ->with('student.user') 
                        ->get()
                        ->pluck('student.user.name', 'id') 
                )
                ->columnSpan(2)
                ->searchable()
                ->required()
                ->visibleOn('create'),
                Forms\Components\Select::make('internship_student_id')
                ->label('Pilih Siswa')
                ->options(
                    InternshipStudent::where('is_magang', true)->where('mentor_id', Auth::user()->mentor->id)
                        ->with('student.user') 
                        ->get()
                        ->pluck('student.user.name', 'id') 
                )
                ->columnSpan(2)
                ->searchable()
                ->required()
                ->disabled()
                ->visibleOn('edit'),
                Forms\Components\DatePicker::make('end_at')
                ->label('Tenggat') 
                ->nullable() 
                ->reactive() 
                ->dehydrated() 
                ->helperText('Jika tidak ada tenggat, biarkan kosong.')
                ->columnSpan(2),
                Forms\Components\Select::make('status')
                ->options([
                    'belum selesai' => 'Belum Selesai',
                    'selesai' => 'Selesai',
                ])
                ->default('belum selesai')
                ->visibleOn('edit')
                ->columnSpan(2)
                ->required()
                ->live()
                ->helperText('Ubah status ke selesai untuk memberikan nilai'),
                Forms\Components\TextInput::make('score')
                ->label('Nilai')
                ->numeric()
                ->maxValue(100)
                ->columnSpan(2)
                ->hidden(fn (Get $get): bool => $get('status') !== 'selesai'),
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
                Tables\Columns\TextColumn::make('internship_student.student.user.name')
                ->label('Nama Siswa')
                ->searchable(),
                Tables\Columns\TextColumn::make('task_header')
                ->label('Tugas')
                ->limit(40),
                Tables\Columns\BadgeColumn::make('score')
                ->label('Nilai')
                ->getStateUsing(function ($record) {
                    if ($record->status !== 'selesai') {
                        return 'belum selesai';
                    }
                    if (is_null($record->score)) {
                        return 'belum dinilai';
                    }
                    return $record->score;
                })
                ->color(function ($state, $record) {
                    if ($record->status !== 'selesai') {
                        return 'warning'; 
                    }
                    if (is_null($record->score)) {
                        return 'danger';
                    }
                    return 'success';
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(), 
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $mentorId = Auth::user()->mentor->id;
    
                // Tambahkan kondisi di sini
                $query->where('mentor_id', $mentorId)
                      ->whereHas('internship_student', function ($subQuery) use ($mentorId) {
                          $subQuery->where('mentor_id', $mentorId);
                      });
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
            'index' => Pages\ListTugasSiswas::route('/'),
            // 'create' => Pages\CreateTugasSiswa::route('/create'),
            'edit' => Pages\EditTugasSiswa::route('/{record}/edit'),
        ];
    }
    
}
