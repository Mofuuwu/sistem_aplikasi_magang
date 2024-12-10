<?php
namespace App\Filament\DashboardSiswa\Resources\PengumumanResource\Pages;

use App\Filament\DashboardSiswa\Resources\PengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use App\Models\Announcement;
use App\Models\AnnouncementComments;

class ViewPengumuman extends Page
{
    protected static ?string $title = 'Lihat Pengumuman';
    protected static string $resource = PengumumanResource::class;
    protected static string $view = 'filament.dashboard-siswa.resources.pengumuman-resource.pages.viewpengumuman';

    public $id;
    public $announcement;
    public $comments;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }

    public function mount($record)
    {
        // Ambil pengumuman berdasarkan ID
        $this->announcement = Announcement::findOrFail($record);
        $this->comments = AnnouncementComments::where('announcement_id', $record)->get();
    }
}
