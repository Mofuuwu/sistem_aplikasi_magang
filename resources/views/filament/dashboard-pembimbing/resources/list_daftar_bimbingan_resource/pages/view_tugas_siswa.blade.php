<x-filament::page>
    @if ($tasks && $tasks->isNotEmpty())
        @foreach ($tasks as $task)
            <x-filament::section collapsible collapsed style="margin-bottom:-2.5%;">
                <x-slot name="heading">
                    <div class="flex justify-between items-center">
                        <p>{{$task->task_header}}</p>
                        <div class="flex gap-1">
                            <x-filament::badge class="max-w-fit" :color="$task->status == 'selesai' ? 'success' : 'danger'">
                                {{$task->status}}
                            </x-filament::badge>
                            <x-filament::button
                            tag="a"
                            href="/dashboard_pembimbing/tugas_siswa/{{$task->id}}/edit"
                            >
                            Lihat Tugas
                            </x-filament::button>
                        </div>
                    </div> 
                </x-slot>
                <div class="flex flex-col gap-4">
                    {!! str($task->task_description)->sanitizeHtml() !!}
                </div>
            </x-filament::section>
        @endforeach
    @else
        <x-filament::section class="text-center p-4 text-gray-600">
            Siswa Belum Memiliki Tugas
        </x-filament::section>
    @endif
</x-filament::page>
