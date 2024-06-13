<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekap Pengeluaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Rekap Pengeluaran</h2>
    @if($startDate && $endDate)
        <p><strong>Tanggal Mulai:</strong> {{ $startDate }}</p>
        <p><strong>Tanggal Selesai:</strong> {{ $endDate }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis Aktivitas</th>
                <th>Biaya</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluaran as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->subject }}</td>
                <td>{{ $item->cost }}</td>
                <td>{{ $item->comment }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
