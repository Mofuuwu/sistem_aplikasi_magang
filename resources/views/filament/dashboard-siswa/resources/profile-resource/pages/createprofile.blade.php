@php
use Illuminate\Support\Facades\Auth;
use App\Models\Major;
use App\Models\School;

$user = Auth::user();
$majors = Major::all();
$schools = School::all();
@endphp

<x-filament::page>
    
@if ($errors->any()) 
    <x-filament::section color="danger" id="error-alert" style="background-color:red;">
        <div class="w-full flex justify-between">
            <ul>
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
            <button 
                style="color: #fff;"
                onclick="closeAlert()" 
                aria-label="Close"
            >
                &times;
            </button>
        </div>
    </x-filament::section>
@endif

    <x-filament::section>
        <form action="{{ route('dashboard_siswa.createprofile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="mb-2 font-bold text-sm">
                Nama :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input 
                    type="text"
                    name="name"
                    required
                    value="{{$user->name}}"
                    />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Kelas :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input.select
                name="class"
                required
                >
                    <option selected disabled>Pilih Kelas</option>
                    <option value="10" >10</option>
                    <option value="11" >11</option>
                    <option value="12" >12</option>
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Sekolah :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input.select
                name="major_id"
                required
                >
                    <option selected disabled>Pilih Jurusan</option>
                    @foreach ( $majors as $major )
                    <option value="{{$major->id}}">{{$major->name}}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Sekolah :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input.select
                name="school_id"
                required
                >
                    <option selected disabled>Pilih Sekolah</option>
                    @foreach ( $schools as $school )
                    <option value="{{$school->id}}">{{$school->name}}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Nomor Telepon :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                    type="text"
                    name="phone_number"
                    required
                    />
            </x-filament::input.wrapper>

            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Alamat :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                    type="text"
                    name="address"
                    required
                    />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Nama Ayah :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                    type="text"
                    name="father_name"
                    required
                    />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Pekerjaan Ayah :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                    type="text"
                    name="father_job"
                    required
                    />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Nama Ibu :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                    type="text"
                    name="mother_name"
                    required
                    />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Pekerjaan Ibu :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                    type="text"
                    name="mother_job"
                    required
                    />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Foto Profil ( ukuran 1 x 1 )
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                    type="file"
                    name="profile_photo"
                    accept="image/*" />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <div class="flex justify-end">
                <x-filament::button
                type="submit">
                    Konfirmasi
                </x-filament::button>
            </div>
        </form>


    </x-filament::section>
</x-filament::page>