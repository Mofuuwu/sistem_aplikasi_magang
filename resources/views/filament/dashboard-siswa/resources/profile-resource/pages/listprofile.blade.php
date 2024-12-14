@php
$kolomData = [
    'Nama Lengkap' => $user->name,
    'Kelas' => $user->student->class ? $user->student->class : '<span style="color: red;">Belum diisi</span>',
    'Jurusan' => $user->student->major_id ? ($user->student->major ? $user->student->major->name : '<span style="color: red;">Belum diisi</span>') : '<span style="color: red;">Belum diisi</span>',
    'Sekolah' => $user->student->school ? $user->student->school->name : '<span style="color: red;">Belum diisi</span>',
    'Nomor Telepon' => $user->student->phone_number ? $user->student->phone_number  : '<span style="color: red;">Belum diisi</span>',
    'Alamat' => $user->student->address ? $user->student->address : '<span style="color: red;">Belum diisi</span>',
    'Nama Ayah' => $user->student->father_name ? $user->student->father_name : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ayah' => $user->student->father_job ? $user->student->father_job : '<span style="color: red;">Belum diisi</span>',
    'Nama Ibu' => $user->student->mother_name ? $user->student->mother_name : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ibu' => $user->student->mother_job ? $user->student->mother_job : '<span style="color: red;">Belum diisi</span>',
    'Status Akun' => $user->student->isactive == 1 
        ? '<span style="color: green;">Aktif</span>' 
        : '<span style="color: red;">Tidak Aktif</span>'
];
@endphp
<x-filament::page>
    <x-filament::section>
        <div class=" w-full flex justify-center items-center">
            <x-filament::avatar
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRU-FjZagg6up7L-ajVO73GVYGIw2rUV8bp3A&s"
                alt="Dan Harrin"
                style="width:30%; height: auto;"
            />
        </div>
        <hr class=" border-gray-600 my-4">
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
            @if ($user->student == null)
            <x-filament::button tag="a" href="profiles/create" size="lg" color="info" style="cursor:pointer;">
                Edit Data siswa
            </x-filament::button>
            @elseif ($user->student != null)
            <x-filament::button tag="a" href="profiles/{{$user->student->id}}/edit" size="lg" color="info" style="cursor:pointer;">
                Edit Data siswa
            </x-filament::button>
            @endif
        </div>
    </x-filament::section>
</x-filament::page>