<x-filament::page>
    <style>
        .logbook-table {
            width: 100%; 
            border-collapse: collapse; 
        }

        .logbook-table th, .logbook-table td {
            padding: 0.75rem 1.25rem; 
            text-align: left;
            border-bottom: 1px solid #D1D5DB; 
        }

        .logbook-table thead {
            background-color: var(--base-200);
        }

        .logbook-table tbody tr {
            background-color: var(--base-100);
        }

        .logbook-table tbody tr:hover {
            background-color: var(--base-200);
        }

        .logbook-table td {
            color: var(--base-content); 
        }

        .logbook-table th {
            color: var(--base-content); 
            font-weight: 600;
        }
    </style>

    @if ($logbook && $logbook->isNotEmpty())
    <x-filament::section>
        <div class="mt-5">
            <!-- Tabel Logbook -->
            <table class="logbook-table">
                <thead>
                    <tr>
                        <th scope="col">
                            Tanggal
                        </th>
                        <th scope="col">
                            Kehadiran
                        </th>
                        <th scope="col">
                            Alasan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logbook as $entry)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($entry->date)->format('d M Y') }}
                            </td>
                            <td>
                                {{ $entry->presence ? 'Hadir' : 'Tidak Hadir' }}
                            </td>
                            <td>
                                {{ $entry->information ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::section>
    @else
    <x-filament::section class="text-center p-4 text-gray-600">
        Logbook Belum Dibuat
    </x-filament::section>
    @endif
</x-filament::page>
