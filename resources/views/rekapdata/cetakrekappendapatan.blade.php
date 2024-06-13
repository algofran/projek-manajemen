<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekap Pendapatan</title>
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
    <h2>Rekap Pendapatan</h2>
    @if($startDate && $endDate)
        <p><strong>Tanggal Mulai:</strong> {{ $startDate }}</p>
        <p><strong>Tanggal Selesai:</strong> {{ $endDate }}</p>
    @endif

    <table>
        <thead class="student-thread">
            <tr>
                <th>No</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                @if (request('data') == 'projek' || request('data') == '')
                    <th>Nama Projek</th>
                    <th>Biaya</th>
                @else
                    <th>Biaya</th>
                    <th>Sektor</th>
                    <th>Paket</th>
                @endif
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendapatan as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    @if (request('data') == 'projek' || request('data') == '')
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->payment }}</td>
                        <td>{{ $item->description }}</td>
                    @else
                        @php
                            $tagIndex =
                            $item->paket;
                            $paket = isset($paket_tag[$tagIndex]) ? $paket_tag[$tagIndex] : "";
                        @endphp
                        <td>{{ $item->tagihan }}</td>
                        <td>{{ $item->sektor }}</td>
                        <td>{{ $paket }}</td>
                    @endif
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
