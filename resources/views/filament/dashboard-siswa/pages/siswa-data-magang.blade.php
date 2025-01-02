<x-filament::page>
    
    @if ( Auth::user() && Auth::user()->student && Auth::user()->student->is_active == '1')
        
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
        @if ($unitRules)
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
        @endif
    @else
    <x-filament::section class="text-center p-4 text-gray-600">
        Anda Belum Terdaftar Sebagai Siswa Magang,
        Silahkan Isi Data Diri Terlebih Dahulu Dan Tunggu Sampai Admin Mengaktifkan Akun Anda
    </x-filament::section>
    @endif

</x-filament-panels::page>
