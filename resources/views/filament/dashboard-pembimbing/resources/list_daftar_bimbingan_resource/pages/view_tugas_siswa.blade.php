<x-filament::page>
    @if ($tasks && $tasks->isNotEmpty())
    <x-filament::button class=" max-w-fit" tag="a" href="create_tugas">
        Buat Tugas
    </x-filament::button>   
    @foreach ($tasks as $task)
        <x-filament::section
        collapsible
        collapsed
        style="margin-bottom:-2.5%;"
        >
            <x-slot name="heading">
                <div class="flex justify-between">
                    <p>{{$task->task_header}}</p>
                    <x-filament::badge class="max-w-fit" :color="$task->status == 'selesai' ? 'success' : 'danger'">
                        {{$task->status}}
                    </x-filament::badge>
                </div> 
            </x-slot>
            <div class="flex flex-col gap-4">
                <p class=" text-sm text-gray-400">{{$task->task_description}}</p>
                <x-filament::section>
                <p class="text-sm">Jawaban : <a>{{$task->status == 'selesai' ? $task->response : 'tugas belum selesai'}}</a> </p>
                </x-filament::section>
            </div>
        </x-filament::section>
    @endforeach
    @else
    <x-filament::section class="text-center p-4 text-gray-600">
        Siswa Belum Memiliki Tugas
    </x-filament::section>
    @endif
</x-filament::page>