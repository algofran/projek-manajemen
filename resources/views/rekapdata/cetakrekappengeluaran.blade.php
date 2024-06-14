<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekap Pengeluaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .info-section {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .info-section p {
            margin: 4px 0;
        }
        .info-section span {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Rekap Pengeluaran</h2>

    
    <div class="info-section">
        <p><span>Dokumen:</span> 
           @switch($dataFilter)
               @case(1)
                   Iconnet
                   @break
               @case(2)
                   Serpo
                   @break
                @case(3)
                   Telkom Akses
                   @break
                @case(4)
                   PLN (Persero)
                   @break
               @default
                   Projek Lainnya
           @endswitch
        </p>
        @if($startDate && $endDate)
        <p><span>Tanggal Mulai:</span> {{ $startDate }}</p>
        <p><span>Tanggal Selesai:</span> {{ $endDate }}</p>
        @endif
    <p><span>Total Dana:</span> {{ 'Rp ' . number_format($pengeluaran->sum('cost'), 0, ',', '.') }}</p>
        <p></p>
    </div>

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
                <td>{{ 'Rp ' . number_format($item->cost, 0, ',', '.') }}</td>
                <td>{{ $item->comment }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
