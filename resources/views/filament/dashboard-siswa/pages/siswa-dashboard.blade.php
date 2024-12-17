@php
use Carbon\Carbon;

$kolomData = [
    'Nama Lengkap' => $user->name ?? '<span style="color: red;">Belum diisi</span>',
    'Kelas' => $user->student && $user->student->class 
        ? $user->student->class 
        : '<span style="color: red;">Belum diisi</span>',
    'Jurusan' => $user->student && $user->student->major_id 
        ? ($user->student->major 
            ? $user->student->major->name 
            : '<span style="color: red;">Belum diisi</span>')
        : '<span style="color: red;">Belum diisi</span>',
    'Sekolah' => $user->student && $user->student->school 
        ? $user->student->school->name 
        : '<span style="color: red;">Belum diisi</span>',
    'Nomor Telepon' => $user->student && $user->student->phone_number 
        ? $user->student->phone_number 
        : '<span style="color: red;">Belum diisi</span>',
    'Alamat' => $user->student && $user->student->address 
        ? $user->student->address 
        : '<span style="color: red;">Belum diisi</span>',
    'Nama Ayah' => $user->student && $user->student->father_name 
        ? $user->student->father_name 
        : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ayah' => $user->student && $user->student->father_job 
        ? $user->student->father_job 
        : '<span style="color: red;">Belum diisi</span>',
    'Nama Ibu' => $user->student && $user->student->mother_name 
        ? $user->student->mother_name 
        : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ibu' => $user->student && $user->student->mother_job 
        ? $user->student->mother_job 
        : '<span style="color: red;">Belum diisi</span>',
    'Status Akun' => $user->student && $user->student->is_active == 1 
        ? '<span style="color: green;">Aktif</span>' 
        : '<span style="color: red;">Tidak Aktif</span>',
];

if($user->student && $user->student->intership_student) {

        $startAt = $user->student->intership_student->start_at 
            ? Carbon::parse($user->student->intership_student->start_at) 
            : null;
        $endAt = $user->student->intership_student->end_at 
            ? Carbon::parse($user->student->intership_student->end_at) 
            : null;
        $today = Carbon::today();

        $hariMagang = $startAt ? $startAt->diffInDays($today) + 1 : null;
        $sisaHariMagang = $endAt ? $today->diffInDays($endAt) : null;
    }

@endphp

<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        width: 100%;
    }

    .grid-item {
        background-color: white;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: 1fr; /* Menjadikan semua elemen dalam satu kolom */
        }
    }
</style>
<x-filament-panels::page>
    @if ($user->student && $user->student->intership_student)
    <div class="grid-container">
        <x-filament::card class="grid-item">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <p><b>Hari Magang Ke</b></p>
                <b><p>{{$hariMagang}}</p></b>
            </div>
        </x-filament::card>
        <x-filament::card class="grid-item">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <p><b>Hari Magang Tersisa</b></p>
                <b><p>{{$sisaHariMagang}}</p></b>
            </div>
        </x-filament::card>
    </div>
    @endif

    <!-- Tugas Hari Ini -->
    @if ($user->student && $user->student->intership_student)
    <x-filament::section collapsible>
        <x-slot name="heading">
            Tugas Hari Ini
        </x-slot>
        @foreach ($uncompletedTasks as $task )
            <x-filament::section class=" mb-5">
                <div class="flex justify-between items-center">
                <!-- Kolom Kiri -->
                    <div>
                        <p class=""><b>{{$task->task_header}}</b></p>
                        <p class="text-sm text-gray-400">dibuat pada : {{$task->start_at}}</p>
                        <p class="text-gray-600 text-sm">{{ Illuminate\Support\Str::limit($task->task_description, 100)}}</p>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="text-right">
                        <x-filament::button href="dashboard_siswa/tugas/{{$task->id}}/edit" tag="a">
                            Lihat
                        </x-filament::button>
                    </div>
                </div>
            </x-filament::section>
        @endforeach
    @endif
            
    </x-filament::section>
    <!-- Data Diri Siswa -->
    <x-filament::section collapsible>
        <x-slot name="heading">
            Data Diri
        </x-slot>
        <x-slot name="description">
            Informasi data diri anda
        </x-slot>

        <!-- Wrapper utama untuk data -->
        <div style="display: table; width: 100%; border-spacing: 0 10px;">
            @foreach ($kolomData as $label => $value)
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 30%;">{{ $label }}</div>
                    <div style="display: table-cell; text-align: center; width: 5%;">:</div>
                    <div style="display: table-cell;">{!! $value !!}</div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Edit Data -->
        <div style="margin-top: 20px; text-align: right;">
            <x-filament::button tag="a" href="dashboard_siswa/profiles" size="lg" color="info" style="cursor:pointer;">
                Profil
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-panels::page>
