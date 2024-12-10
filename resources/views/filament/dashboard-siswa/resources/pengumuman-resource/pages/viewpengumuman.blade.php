<x-filament::page>
@if(session('success'))
    <x-filament::section color="success" id="success-alert" style="background-color:green;">
        <div class="w-full flex justify-between">
            <p>{{ session('success') }}</p>
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
<div id="popup" class="bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg w-full custom-width h-[calc(66vh)] flex flex-col p-6 relative">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <h3 id="popup-title" class="text-lg font-bold text-gray-800 dark:text-gray-100">
                    {{ $announcement->header }}
                </h3>
                <p>
                    {{ $announcement->created_at }}
                </p>
            </div>
            
            <p id="popup-description" class="text-sm text-gray-600 dark:text-gray-300 mb-6 flex-grow overflow-y-auto mb-4">
                {{ $announcement->content }}
            </p>

            <!-- Komentar Baru -->
            <form class="flex items-center justify-between mb-4" method="post" action="{{route('dashboard_siswa.addcomment')}}">
                @csrf
                <x-filament::input
                    style="border-bottom:2px solid #383734"
                    placeholder="Masukkan Komentar"
                    name="content"
                    required
                >
                </x-filament::input>
                <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                <x-filament::button
                    type="submit"
                    style="padding: 8px 16px;"
                    color="primary"
                >
                    Kirim
                </x-filament::button>
            </form>

            <!-- Komentar Lama -->
            <div class="flex flex-col gap-2">
                <h4 class="text-sm font-bold text-gray-800 dark:text-gray-100">Semua Komentar</h4>
                @foreach ($comments as $comment)
                    <div class="flex gap-2 items-start">
                        <img src="https://via.placeholder.com/40" alt="Foto Profil" class="w-10 h-10 rounded-full">
                        <div>
                            <p class="text-sm font-medium text-gray-800 dark:text-gray-100">{{$comment->user->name}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{$comment->content}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

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
