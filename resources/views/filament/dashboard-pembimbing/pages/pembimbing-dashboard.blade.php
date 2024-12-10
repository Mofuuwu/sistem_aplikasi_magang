<?php

use App\Models\Student;
$kolomData = [
    'Nama Lengkap' => $userData->name,
    'Kelas' => $studentData ? $studentData->class : '<span style="color: red;">Belum diisi</span>',
    'Jurusan' => $studentData ? ($studentData->major ? $studentData->major->name : '<span style="color: red;">Belum diisi</span>') : '<span style="color: red;">Belum diisi</span>',
    'Sekolah' => $studentData ? $studentData->school_id : '<span style="color: red;">Belum diisi</span>',
    'Nomor Telepon' => $studentData ? $studentData->phone_number : '<span style="color: red;">Belum diisi</span>',
    'Alamat' => $studentData ? $studentData->address : '<span style="color: red;">Belum diisi</span>',
    'Nama Ayah' => $studentData ? $studentData->father_name : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ayah' => $studentData ? $studentData->father_job : '<span style="color: red;">Belum diisi</span>',
    'Nama Ibu' => $studentData ? $studentData->mother_name : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ibu' => $studentData ? $studentData->mother_job : '<span style="color: red;">Belum diisi</span>',
    'Status Akun' => $studentData ? ($studentData->is_active == 1 
        ? '<span style="color: green;">Aktif</span>' 
        : '<span style="color: red;">Tidak Aktif</span>') 
    : '<span style="color: red;">Belum diisi</span>',
];
?>

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
    <div class="grid-container">
        <x-filament::card class="grid-item">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <p><b>Hari Magang Ke</b></p>
                <b><p>10</p></b>
            </div>
        </x-filament::card>
        <x-filament::card class="grid-item">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <p><b>Hari Magang Tersisa</b></p>
                <b><p>200</p></b>
            </div>
        </x-filament::card>
    </div>

    <!-- Tugas Hari Ini -->
    <x-filament::section collapsible>
        <x-slot name="heading">
            Tugas Hari Ini
        </x-slot>
            <x-filament::section>
                <div class="flex justify-between items-center">
                <!-- Kolom Kiri -->
                    <div>
                        <p><b>Belajar Filament</b></p>
                        <p class="text-gray-600">Ini adalah deskripsi tugas yang menjelaskan detail dari tugas tersebut.</p>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Dikirimkan: 2024-11-30</p>
                    </div>
                </div>
            </x-filament::section>
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
            <x-filament::button tag="a" href="" size="lg" color="info" style="cursor:pointer;">
                Edit Data siswa
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-panels::page>
