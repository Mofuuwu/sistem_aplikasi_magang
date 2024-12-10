<?php
$kolomData = [
    'Nama Lengkap' => $user->name,
    'Pembimbing' => $user->student->intership_student->mentor->user->name,
    'Unit' => $user->student->intership_student->work_unit->name,
    'Lokasi' => $user->student->intership_student->work_unit->placement_location->name,
    'Alamat' => $user->student->intership_student->work_unit->placement_location->address,
    'Mulai dari' => $user->student->intership_student->start_at,
    'Selesai pada' => $user->student->intership_student->end_at
];
?>
<x-filament-panels::page>
    <x-filament::section>
    <x-slot name="heading">
        Data Magang Anda
    </x-slot>
        <div style="display: table; width: 100%; border-spacing: 0 10px;">
            @foreach ($kolomData as $label => $value)
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 30%;">{{ $label }}</div>
                    <div style="display: table-cell; text-align: center; width: 5%;">:</div>
                    <div style="display: table-cell;">{!! $value !!}</div>
                </div>
            @endforeach
        </div>
    </x-filament::section>

    <x-filament::section>
        <x-slot name="heading">
            Peraturan Umum
        </x-slot>
            <p>
                @php $counter1 = 1 @endphp
                @foreach ($generalRules as $g)
                    <ul>
                        {{$counter1}}. {{$g->description}}
                        @php $counter1++ @endphp
                    </ul>
                @endforeach
            </p>
    </x-filament::section>
    <x-filament::section>
        <x-slot name="heading">
            Peraturan Unit
        </x-slot>
            <p>
                @php $counter2 = 1 @endphp
                @foreach ($unitRules as $p)
                    <ul>
                    {{$counter2}}. {{$p->description}}
                    @php $counter2++ @endphp
                    </ul>
                @endforeach
            </p>
    </x-filament::section>
</x-filament-panels::page>
