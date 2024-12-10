

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Jurnal Kegiatan PKL Siswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Presensi</th>
                <th>Informasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logbooks as $logbook)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Carbon\Carbon::parse($logbook->date)->format('d/m/Y') }}</td>
                    <td>{{ $logbook->presence }}</td>
                    <td>{{ $logbook->information }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>