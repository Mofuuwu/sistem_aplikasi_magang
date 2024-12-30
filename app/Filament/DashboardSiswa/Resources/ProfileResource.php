<?php

namespace App\Filament\DashboardSiswa\Resources;

use App\Filament\DashboardSiswa\Resources\ProfileResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    protected static ?string $navigationLabel = 'Profil Anda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('profile_photo')
                ->label('Foto Profil')
                ->columnSpan(2)
                ->image()
                ->imageEditor()
                ->disk('public') 
                ->directory('image') ,
                Forms\Components\Select::make('class')
                ->label('Kelas')
                ->options([
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                ]),
                Forms\Components\Select::make('major_id') 
                ->label('Jurusan')
                ->relationship('major', 'name') 
                ->required(),
                Forms\Components\Select::make('school_id') 
                ->label('Sekolah')
                ->relationship('school', 'name') 
                ->required(),
                Forms\Components\TextInput::make('phone_number')
                ->label('Nomor Telepon'),
                Forms\Components\Textarea::make('address')
                ->label('Alamat')
                ->columnSpan(2),
                Forms\Components\TextInput::make('father_name')
                ->label('Nama Ayah'),
                Forms\Components\TextInput::make('mother_name')
                ->label('Nama Ibu'),
                Forms\Components\TextInput::make('father_job')
                ->label('Pekerjaan Ayah'),
                Forms\Components\TextInput::make('mother_job')
                ->label('Pekerjaan Ibu'),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
