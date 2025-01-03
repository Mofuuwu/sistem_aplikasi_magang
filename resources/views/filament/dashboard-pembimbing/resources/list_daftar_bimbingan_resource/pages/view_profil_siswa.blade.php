@php
$kolomData = [
    'Nama Lengkap' => $student->user->name ?? '<span style="color: red;">Belum diisi</span>',
    'Kelas' => $student && $student->class 
        ? $student->class 
        : '<span style="color: red;">Belum diisi</span>',
    'Jurusan' => $student && $student->major_id 
        ? ($student->major 
            ? $student->major->name 
            : '<span style="color: red;">Belum diisi</span>')
        : '<span style="color: red;">Belum diisi</span>',
    'Sekolah' => $student && $student->school 
        ? $student->school->name 
        : '<span style="color: red;">Belum diisi</span>',
    'Nomor Telepon' => $student && $student->phone_number 
        ? $student->phone_number 
        : '<span style="color: red;">Belum diisi</span>',
    'Alamat' => $student && $student->address 
        ? $student->address 
        : '<span style="color: red;">Belum diisi</span>',
    'Nama Ayah' => $student && $student->father_name 
        ? $student->father_name 
        : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ayah' => $student && $student->father_job 
        ? $student->father_job 
        : '<span style="color: red;">Belum diisi</span>',
    'Nama Ibu' => $student && $student->mother_name 
        ? $student->mother_name 
        : '<span style="color: red;">Belum diisi</span>',
    'Pekerjaan Ibu' => $student && $student->mother_job 
        ? $student->mother_job 
        : '<span style="color: red;">Belum diisi</span>',
    'Waktu Magang' => $student && $student->internship_student 
        ? $student->internship_student->start_at . " - " . $student->internship_student->end_at 
        : '<span style="color: red;">Belum diisi</span>',
];

@endphp
<x-filament::page>
    <style>
        .vertical-line {
            width: 1px;
            background-color: white;
            border-radius: 16px;
        }
        .flex-item-1 {
            width:25%
        }
        .flex-item-2 {
            width:70%
        }
        .label-width {
            width: 20%;
        }
        .img-width {
            width:70%; 
            height: auto;
        }

        @media (max-width: 1300px) {
            .label-width {
                width: 30%;
            }
        }
        
        @media (max-width: 768px) {
            .flex-column {
                flex-direction: column;
                width: 100%;
            }

            .vertical-line {
                display: none; 
            }

            
            .flex-item-1 {
                width:100%
            }
            .flex-item-2 {
                width:100%
            }
            .label-width {
                width: 40%;
            }
            .img-width {
                width:30%; 
                height: auto;
                margin-bottom: 20px;
            }
        }
        @media (max-width: 600px) {
            .img-width {
                width:50%; 
                height: auto;
                margin-bottom: 20px;
            }
        }
    </style>
    
    <x-filament::section>
        <div class="flex justify-between flex-column">
            <!-- Avatar -->
            <div class="flex justify-center items-center flex-item-1">
                <x-filament::avatar
                    class="img-width"
                    src="{{ $student ? asset('storage/profile_photos/' . $student->profile_photo) : '' }}"
                    alt="{{ $student->user->name }}"
                />
            </div>
            
            <!-- Vertical line -->
            <div class="vertical-line"></div>
            
            <!-- Wrapper utama untuk data -->
            <div style="display: table; border-spacing: 0 2px;" class="flex-item-2">
                @foreach ($kolomData as $label => $value)
                    <div style="display: table-row;">
                        <div class="label-width" style="display: table-cell;">{{ $label }}</div>
                        <div style="display: table-cell; text-align: center; width: 5%;">:</div>
                        <div style="display: table-cell;">{!! $value !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-filament::section>
</x-filament::page>
