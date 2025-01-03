@php
use Illuminate\Support\Facades\Auth;
use App\Models\Major;
use App\Models\School;

$user = Auth::user();
$name = Auth::user()->name;
$address = $user->student->address;
$father_name = $user->student->father_name;
$father_job = $user->student->father_job;
$mother_name = $user->student->mother_name;
$mother_job = $user->student->mother_job;
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
        <form action="{{ route('dashboard_siswa.editprofile', $user->student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="mb-2 font-bold text-sm">
                Nama :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input 
                    type="text"
                    name="name"
                    required
                    value={{$name}} />
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
                    <option value="10" @selected($user->student->class == '10')>10</option>
                    <option value="11" @selected($user->student->class == '11')>11</option>
                    <option value="12" @selected($user->student->class == '12')>12</option>
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Jurusan :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input.select
                name="major_id"
                required
                >
                    @foreach ( $majors as $major )
                    <option value="{{$major->id}}" @selected($user->student->major_id == $major->id)>{{$major->name}}</option>
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
                    @foreach ( $schools as $school )
                    <option value="{{$school->id}}" @selected($user->student->school_id == $school->id)>{{$school->name}}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Nomor Telepon :
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-slot name="prefix">
                    Nomor Telepon :
                </x-slot>
                <x-filament::input
                    type="number"
                    name="phone_number"
                    required
                    value="{{$user->student->phone_number}}" />
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
                    value={{$address}} />
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
                    value={{$father_name}} />
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
                    value={{$father_job}} />
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
                    value={{$mother_name}} />
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
                    value={{$mother_job}} />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Foto Profil ( ukuran 1 x 1 ) -- boleh dikosongkan dulu
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