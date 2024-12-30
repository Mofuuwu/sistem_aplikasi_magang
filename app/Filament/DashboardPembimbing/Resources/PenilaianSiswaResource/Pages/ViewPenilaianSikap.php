<?php

namespace App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource\Pages;

use Filament\Actions;
use App\Models\Evaluation;
use App\Models\IntershipStudent;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use App\Filament\DashboardPembimbing\Resources\PenilaianSiswaResource;

class ViewPenilaianSikap extends ListRecords
{
    protected static string $resource = PenilaianSiswaResource::class;
    protected static ?string $title = 'Penilaian Sikap Siswa';

    public function createEvaluations()
    {
        // Ambil data siswa berdasarkan user yang sedang login
        $studentData = IntershipStudent::where('mentor_id', Auth::user()->mentor->id)
            ->first(); // Sesuaikan logika ini dengan kebutuhan Anda untuk mendapatkan data siswa

        if (!$studentData) {
            session()->flash('error', 'Data siswa tidak ditemukan.');
            return;
        }

        // Menambahkan data evaluasi
        Evaluation::create([
            'intership_student_id' => $studentData->id,
            'type' => 'sikap',
            'task_id' => null, // Karena ini penilaian sikap
            'score' => null,   // Nilai untuk penilaian sikap, sesuaikan jika perlu
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menampilkan pesan sukses dan mengarahkan kembali ke halaman penilaian
        session()->flash('success', 'Penilaian Sikap berhasil ditambahkan.');
        return redirect()->route('filament.resources.penilaian-siswa.index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('createEvaluations')
                ->label('Tambah Penilaian Sikap')
                ->action(function () {
                    // Memanggil method untuk membuat evaluasi
                    $this->createEvaluations();
                }),

            Actions\Action::make('back')
                ->label('Kembali')
                ->color('info')
                ->url(fn () => static::getResource()::getUrl('index')),
        ];
    }

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder|null
    {
        // Ambil ID siswa dari parameter URL
        $studentId = request()->route('record');

        // Jika ID siswa tidak ada, kembalikan query kosong
        if (!$studentId) {
            return Evaluation::query()->whereRaw('1 = 0'); // Tidak menampilkan data
        }

        // Filter data berdasarkan mentor, type = "sikap", dan ID siswa dari URL
        return Evaluation::query()
            ->where('intership_student_id',$studentId)
            ->where('type', 'sikap');
    }
}
