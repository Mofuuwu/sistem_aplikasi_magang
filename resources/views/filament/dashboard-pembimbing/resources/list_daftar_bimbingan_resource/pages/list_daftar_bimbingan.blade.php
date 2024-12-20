<x-filament::page>
    
<style>
    
    .container {
        width: 100%;
        gap: 15px;
        display: flex;
        flex-wrap: wrap;
    }

    .card {
        width: 48%;
        min-height: 160px;
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
        width: 20%;
        height: 20%;
    }
    .card-img {
        width: 100%;
        height: 100%;
    }
    .card-content {
        width: 75%;
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
    <div class="container">
        @foreach ($intership_students as $is)
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
                    <div class="row martop-1">
                        <x-filament::button class="text-sm btn " tag="a" href="daftar_siswa_bimbingan/profil_siswa/{{$is->student->id}}" color="success">Profil</x-filament::button>
                        <x-filament::button class="text-sm btn " tag="a" href="daftar_siswa_bimbingan/tugas_siswa/{{$is->student->id}}" color="primary">Tugas</x-filament::button>
                        <x-filament::button class="text-sm btn " tag="a" href="daftar_siswa_bimbingan/logbook_siswa/{{$is->student->id}}" color="danger">Logbook</x-filament::button>
                    </div>
                </div>
                </div>
            </x-filament::section>
        @endforeach
    </div>
</x-filament::page>
