@php
@endphp
<x-filament::page>
<style>
    
    .container {
        width: 100%;
        gap: 3.7%;
        display: flex;
        flex-wrap: wrap;
    }

    .card {
        width: 48%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card-inner {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* background-color: blue; */
    }
    .image {
        /* background-color: red; */
        width: 15%;
        height: 15%;
    }
    .card-img {
        width: 100%;
        height: 100%;
    }
    .card-content {
        width: 80%;
        /* background-color: aqua; */
    }
    .row {
        display: flex;
        gap: 4px;
    }
    .martop-1 {
        margin-top: 5px;
    }
    .btn {
        padding: 4px 10px;
        border-radius: 12px;
    }
    h1 {
        font-weight: bold;
        font-size: 1.8rem;
    }
    @media screen and (max-width:800px) {
        .card {
            width: 100%;
            min-height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
</style>
    <x-filament::section>
        <div class="flex gap-2">
        Sekarang Tanggal : <x-filament::badge>{{ now()->locale('id')->format('l, d F Y') }}</x-filament::badge>
        </div>
    </x-filament::section>
    <div class="flex gap-8">
        <x-filament::section class="w-1/2">
            <div class="flex gap-2">
                <x-filament::badge color="danger">{{$studentsWithoutPendingTasks->count()}}</x-filament::badge> Siswa Belum Mendapatkan Tugas
            </div>
        </x-filament::section>
        <x-filament::section class="w-1/2">
            <div class="flex gap-2">
                <x-filament::badge color="success">{{$studentsWithPendingTasks->count()}}</x-filament::badge> Siswa Telah Ditugaskan
            </div>
        </x-filament::section>
    </div>
    <h1 style="color:#ef4444;">Siswa Belum Ditugaskan</h1>
    <div class="container gap-2">
    @foreach ($studentsWithoutPendingTasks as $is)
            <x-filament::section class="card">
                <div class="card-inner">
                <div class="image">
                    <x-filament::avatar class="card-img"
                        src="{{asset('storage/profile_photos/' . $is->student->profile_photo)}}"
                        alt="Dan Harrin"
                    />
                </div>
                <div class="card-content">
                    <p class="text-md"><b>{{$is->student->user->name}}</b></p>
                    <p class="text-sm"><i>{{$is->student->major->name}}</i></p>
                </div>
                </div>
            </x-filament::section>
    @endforeach
    </div>
    <h1 style="color:#10B981;">Siswa Ditugaskan</h1>
    <div class="container gap-2">
    @foreach ($studentsWithPendingTasks as $is)
            <x-filament::section class="card">
                <div class="card-inner">
                <div class="image">
                    <x-filament::avatar class="card-img"
                        src="{{asset('storage/profile_photos/' . $is->student->profile_photo)}}"
                        alt="Dan Harrin"
                    />
                </div>
                <div class="card-content">
                    <p class="text-md"><b>{{$is->student->user->name}}</b></p>
                    <p class="text-sm"><i>{{$is->student->major->name}}</i></p>
                </div>
                </div>
            </x-filament::section>
    @endforeach
    </div>
</x-filament::page>
