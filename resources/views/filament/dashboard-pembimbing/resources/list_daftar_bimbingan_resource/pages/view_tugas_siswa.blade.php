<x-filament::page>
    @if ($tasks && $tasks->isNotEmpty())
        @foreach ($tasks as $task)
            <x-filament::section style="margin-bottom:-2.5%;">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row gap-3">
                        <p>{{$task->task_header}}</p>
                        <x-filament::badge class="max-w-fit" :color="$task->status == 'selesai' ? 'success' : 'danger'">
                            {{$task->status}}
                        </x-filament::badge>
                        </div>
                        <div class="flex gap-3">
                            @if ($task->status == 'selesai')
                            <x-filament::badge class="max-w-fit" :color="$task->score == null ? 'danger' : 'success'">
                                {{$task->score == null? 'belum dinilai' : $task->score }}
                            </x-filament::badge>
                            @endif
                            <x-filament::button
                            tag="a"
                            href="/dashboard_pembimbing/tugas_siswa/{{$task->id}}/edit"
                            >
                            Lihat Tugas
                            </x-filament::button>
                        </div>
                    </div> 
            </x-filament::section>
        @endforeach
    @else
        <x-filament::section class="text-center p-4 text-gray-600">
            Siswa Belum Memiliki Tugas
        </x-filament::section>
    @endif
</x-filament::page>
