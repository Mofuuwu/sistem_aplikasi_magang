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
                <div class="flex items-center">
                    <!-- Judul --> 
                    <div class="text-sm font-medium text-gray-800 dark:text-gray-200 mx-3">
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
