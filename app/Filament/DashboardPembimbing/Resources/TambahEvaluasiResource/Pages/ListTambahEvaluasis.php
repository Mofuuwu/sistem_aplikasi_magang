<?php

namespace App\Filament\DashboardPembimbing\Resources\TambahEvaluasiResource\Pages;

use Filament\Actions;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use App\Filament\DashboardPembimbing\Resources\TambahEvaluasiResource;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTambahEvaluasis extends ListRecords
{
    protected static string $resource = TambahEvaluasiResource::class;
    protected static ?string $title = 'Tambah Nilai';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Nilai Siswa'),
        ];
    }
    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make('Semua')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('mentor_id', Auth::user()->mentor->id);
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Evaluation::where('mentor_id', Auth::user()->mentor->id)->count();
                }
            )
            ->badgeColor('primary'),
            'Sikap' => Tab::make('Sikap')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('mentor_id', Auth::user()->mentor->id)->where('type', 'sikap');
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Evaluation::where('mentor_id', Auth::user()->mentor->id)->where('type', 'sikap')->count();
                }
            )
            ->badgeColor('info'),
            'Kehadiran' => Tab::make('Kehadiran')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('mentor_id', Auth::user()->mentor->id)->where('type', 'kehadiran');
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Evaluation::where('mentor_id', Auth::user()->mentor->id)->where('type', 'kehadiran')->count();
                }
            )
            ->badgeColor('success'),
        ];
    }
}
