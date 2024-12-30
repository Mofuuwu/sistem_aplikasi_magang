<?php

namespace App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource\Pages;

use Filament\Actions;
use App\Models\Announcement;
use Filament\Resources\Pages\Page;
use App\Models\AnnouncementComments;
use Illuminate\Support\Facades\Gate;
use App\Filament\DashboardPembimbing\Resources\PengumumanPembimbingResource;

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
        if (!Gate::allows('mentor-announcement-policy', $this->pengumuman)) {
            abort(403, 'Anda tidak memiliki akses untuk melihat pengumuman ini');
        }
    }
}
