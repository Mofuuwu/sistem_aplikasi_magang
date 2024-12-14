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
    <x-filament::section>
            <p class="mb-2 font-bold text-sm">
                Nama : 
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input            
                type="text"
                value={{$name}}
                />
            </x-filament::input.wrapper>
        <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Kelas : 
            </p>
            <x-filament::input.wrapper  class="mb-4">
                <x-filament::input.select>
                    <option disabled @selected($user->student->class == '')>Pilih Kelas</option>
                    <option value="10" @selected($user->student->class == '10')>10</option>
                    <option value="11" @selected($user->student->class == '11')>11</option>
                    <option value="12" @selected($user->student->class == '12')>12</option>
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Sekolah : 
            </p>
            <x-filament::input.wrapper  class="mb-4">
                <x-filament::input.select>
                    <option disabled @selected($user->student->major == '')>Pilih Jurusan</option>
                    @foreach ( $majors as $major )
                    <option value="{{$major->name}}" @selected($user->student->major_id == $major->id)>{{$major->name}}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Sekolah : 
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input.select>
                    <option disabled @selected($user->student->school == '')>Pilih Sekolah</option>
                    @foreach ( $schools as $school )
                    <option value="{{$school->name}}" @selected($user->student->school_id == $school->id)>{{$school->name}}</option>
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
                
                type="text"
                value="{{$user->student->phone_number}}"
                />
            </x-filament::input.wrapper>

        <hr class="border-gray-600 mb-4">
        <p class="mb-2 font-bold text-sm">
                Alamat : 
        </p>
        <x-filament::input.wrapper class="mb-4">
            <x-filament::input
            
              type="text"
              value={{$address}}
            />
        </x-filament::input.wrapper>
        <hr class="border-gray-600 mb-4">

            <p class="mb-2 font-bold text-sm">
                Nama Ayah : 
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                
                type="text"
                value={{$father_name}}
                />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Pekerjaan Ayah : 
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                
                type="text"
                value={{$father_job}}
                />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Nama Ibu : 
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                
                type="text"
                value={{$mother_name}}
                />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Pekerjaan Ibu : 
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                
                type="text"
                value={{$mother_job}}
                />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
            <p class="mb-2 font-bold text-sm">
                Foto Profil
            </p>
            <x-filament::input.wrapper class="mb-4">
                <x-filament::input
                type="file"
                
                />
            </x-filament::input.wrapper>
            <hr class="border-gray-600 mb-4">
        

        
    </x-filament::section>
</x-filament::page>
