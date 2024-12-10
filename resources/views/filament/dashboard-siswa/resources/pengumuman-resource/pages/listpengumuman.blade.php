<x-filament::page>
    @if(session('success'))
        <div class="alert alert-success bg-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="space-y-4">
        @foreach ($announcements as $announcement)
            <section 
                class="border rounded-lg shadow-sm p-4 flex items-center justify-between bg-white dark:bg-gray-800 dark:border-gray-700">
                <!-- Kiri: Status Icon -->
                <div class="flex items-center space-x-4">
                    <div class="flex justify-center items-center w-10 h-10 text-white rounded-full font-bold">
                    <x-filament::icon
                    alias="panels::topbar.global-search.field"
                    wire:target="search"
                    class="h-5 w-5 text-gray-500 dark:text-gray-400"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                    </svg>
                    </x-filament::icon>
                    </div>
                    <!-- Judul -->
                    <div class="text-sm font-medium text-gray-800 dark:text-gray-200">
                        {{ $announcement->header }}
                    </div>
                </div>
                <!-- Kanan: Tombol -->
                <x-filament::button
                href="pengumuman/{{$announcement->id}}"
                tag="a"
                color="info">
                    Lihat
                </x-filament::button>
            </section>
        @endforeach
    </div>
</x-filament::page>
