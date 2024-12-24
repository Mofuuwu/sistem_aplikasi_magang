<?php

namespace App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\Pages;

use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource;
use App\Models\Announcement;
use App\Models\AnnouncementComments;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;

class ViewPengumumanPembimbing extends Page
{
    public $pengumuman;
    public $komentar;
    protected static ?string $title = 'Komentar';
    protected static string $view = 'filament.dashboard-pembimbing.resources.pengumuman_pembimbing_resource.pages.view_pengumuman_pembimbing';
    protected static string $resource = PengumumanPembimbingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }
    public function mount($record) {
        $this->pengumuman = Announcement::findOrFail($record);
        $this->komentar = AnnouncementComments::where('announcement_id', $this->pengumuman->id)->get();
    }
}
