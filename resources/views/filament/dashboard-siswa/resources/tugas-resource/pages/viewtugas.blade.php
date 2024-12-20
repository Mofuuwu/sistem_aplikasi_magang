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
            <x-slot name="heading">
                User details
            </x-slot>
            <div class="flex justify-between items-center">
                <h3 color="primary" id="popup-title" class="text-lg font-bold text-primary-600">
                    {{$task->task_header}}
                </h3>
                @if ($task->status == 'belum selesai')
                    <x-filament::badge
                        color="warning"
                    >
                        {{$task->status}}
                    </x-filament::badge>
                @elseif ($task->status == 'selesai')
                    <x-filament::badge
                        color="success"
                    >
                        {{$task->status}}
                    </x-filament::badge>
                @endif
            </div>
            <p class="text-sm text-gray-400 mb-4">
                    {{$task->start_at}} - {{$task->end_at}}
            </p>
            <hr class=" border-gray-600">
            <p class="text-md font-bold mb-2 mt-6 text-primary-600">
                Petunjuk Tugas
            </p>
            <p class="text-sm text-white border border-3 border-gray-600 px-3 py-2 rounded rounded-lg mb-4">
                {{$task->task_description}}
            </p>
            <p class="text-md font-bold text-primary-600 text-bold mt-2 mb-2">
                    Jawaban Anda 
            </p>

            @if ($task->status == 'belum selesai')

            <form  method="post" action="{{ route('dashboard_siswa.submittask', $task->id) }}">
                @csrf
                @method('PUT')
                <x-filament::input.wrapper>
                    <x-filament::input
                        type="text"
                        placeholder="Masukkan Link Drive Disini"
                        name="response"
                        required
                    />
                </x-filament::input.wrapper>
                <div class="flex justify-end mt-6">
                    <x-filament::button
                            type="submit"
                            class="w-32"
                            style="padding: 8px 16px;"
                            color="primary"
                        >
                            Kirim
                    </x-filament::button>
                </div>
            </form>
            @elseif($task->status == 'selesai')
                <x-filament::input.wrapper>
                    <x-filament::input
                        type="text"
                        value="{{$task->response}}"
                        name="response"
                        disabled
                    />
                </x-filament::input.wrapper>
            @endif
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
