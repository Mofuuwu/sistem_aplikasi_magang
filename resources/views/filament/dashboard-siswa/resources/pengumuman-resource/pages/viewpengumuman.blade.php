<x-filament::page>
    @if(session('success'))
    <x-filament::section color="success" id="success-alert" style="background-color:green;">
        <div class="w-full flex justify-between">
            <p>{{ session('success') }}</p>
            <button
                style="color: #fff;"
                onclick="closeAlert()"
                aria-label="Close">
                &times;
            </button>
        </div>
    </x-filament::section>
    @endif
    
    <div id="popup" class="bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg w-full custom-width h-[calc(66vh)] flex flex-col p-6 relative">
            <!-- Header -->
            <p class="text-sm text-gray-600">
                Dibuat pada : {{ $announcement->created_at }}
            </p>
            <h3 id="popup-title" class="text-md text-gray-800 dark:text-gray-100">
                {{ $announcement->content }}
            </h3>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-lg w-full custom-width h-[calc(66vh)] flex flex-col p-6 relative">
        <!-- Komentar Baru -->
        <form class="flex items-center justify-between my-4" method="post" action="{{route('dashboard_siswa.addcomment')}}">
            @csrf
            <x-filament::input
                style="border:2px solid #383734; border-radius:16px; margin-right:1%;"
                placeholder="Masukkan Komentar"
                name="content"
                required>
            </x-filament::input>
            <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
            <x-filament::button
                type="submit"
                style="padding: 1% 4%; border-radius:12px;"
                color="primary">
                Kirim
            </x-filament::button>
        </form>

        <!-- Komentar Lama -->
        <div class="flex flex-col gap-2">
            <h4 class="text-sm font-bold text-gray-800 dark:text-gray-100">Semua Komentar</h4>
            @foreach ($comments as $comment)
            <div class="flex gap-2 items-start">
                <img src="{{ $comment->user->role_id == '3' ? asset('storage/profile_photos/' . $comment->user->student->profile_photo) : 'https://cdn-icons-png.flaticon.com/512/3541/3541871.png' }}" alt="Foto Profil" class="w-10 h-10 rounded-full">
                <div>
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-100">{{$comment->user->name}}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{$comment->content}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-filament::page>
<script>
    function closeAlert() {
        const alertElement = document.getElementById('success-alert');
        if (alertElement) {
            alertElement.style.transition = "opacity 0.3s ease";
            alertElement.style.opacity = "0";
            setTimeout(() => alertElement.style.display = "none", 300); // Sembunyikan elemen setelah transisi
        }
    }
</script>