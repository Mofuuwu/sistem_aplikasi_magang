<x-filament::page>
    <style>
        .logbook-table {
            width: 100%; /* Mengatur tabel agar memenuhi lebar container */
            border-collapse: collapse; /* Agar border antar sel lebih rapat */
        }

        .logbook-table th, .logbook-table td {
            padding: 0.75rem 1.25rem; /* Padding untuk cell */
            text-align: left;
            border-bottom: 1px solid #D1D5DB; /* Menambahkan garis di bawah setiap sel dengan warna yang lebih netral */
        }

        .logbook-table thead {
            background-color: var(--base-200); /* Warna header menyesuaikan tema */
        }

        .logbook-table tbody tr {
            background-color: var(--base-100); /* Warna latar belakang baris data */
        }

        .logbook-table tbody tr:hover {
            background-color: var(--base-200); /* Warna saat hover menyesuaikan tema */
        }

        .logbook-table td {
            color: var(--base-content); /* Warna teks sesuai tema */
        }

        .logbook-table th {
            color: var(--base-content); /* Warna teks header sesuai tema */
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
