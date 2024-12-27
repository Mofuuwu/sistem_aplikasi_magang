<?php
namespace App\Filament\DashboardSiswa\Resources\PengumumanResource\Pages;

use Filament\Actions;
use App\Models\Announcement;
use Filament\Resources\Pages\Page;
use App\Models\AnnouncementComments;
use Illuminate\Support\Facades\Gate;
use App\Filament\DashboardSiswa\Resources\PengumumanResource;

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
        $this->announcement = Announcement::findOrFail($record);
        $this->comments = AnnouncementComments::where('announcement_id', $record)->get();

        if (!Gate::allows('student-announcements-policy', $this->announcement)) {
            abort(403, 'Anda tidak memiliki akses untuk melihat pengumuman ini');
        }
    }
}
