<?php

namespace App\Filament\DashboardPembimbing\Resources\TugasSiswaResource\Pages;

use App\Filament\DashboardPembimbing\Resources\TugasSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Models\Task;
use App\Models\Student;
use App\Models\InternshipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTugasSiswas extends ListRecords
{
    protected static ?string $title = 'Daftar Tugas Siswa';
    protected static string $resource = TugasSiswaResource::class;
    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make('Semua')
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Task::where('mentor_id', Auth::user()->mentor->id)->count();
                }
            )
            ->badgeColor('info'),
            'Ditugaskan' => Tab::make('Ditugaskan')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('status', 'belum selesai');
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Task::where('mentor_id', Auth::user()->mentor->id)->where('status', 'belum selesai')->count();
                }
            )
            ->badgeColor('warning'),
            'Selesai' => Tab::make('Selesai')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('status', 'selesai');
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Task::where('mentor_id', Auth::user()->mentor->id)->where('status', 'selesai')->count();
                }
            )
            ->badgeColor('success'),
            'Belum Dinilai' => Tab::make('Belum Dinilai')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('status', 'selesai')->where('score', null);
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Task::where('mentor_id', Auth::user()->mentor->id)->where('status', 'selesai')->where('score', null)->count();
                }
            )
            ->badgeColor('danger'),
            'Dinilai' => Tab::make('Dinilai')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('status', 'selesai')->whereNotNull('score');
            })
            ->icon('heroicon-m-user-group')
            ->badge(
                badge: function() {
                    return Task::where('mentor_id', Auth::user()->mentor->id)->where('status', 'selesai')->whereNotNull('score')->count();
                }
            )
            ->badgeColor('success'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Tugas'),
        ];
    }
}
