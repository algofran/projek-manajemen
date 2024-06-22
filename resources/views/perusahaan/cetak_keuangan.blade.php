<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Halaman</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
          
        }

        .header {
            text-align: left;
            margin-bottom: 20px;
        }

        /* Mengurangi margin atas dan bawah untuk tag <p> */
        .header p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-primary {
            color: rgb(0, 157, 255);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>LAPORAN KEUANGAN</h3>
            <p><strong>Nama Project:</strong>  @php
                $paket_tag = [
                $project->keterangan,
                "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
                "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
                "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
                "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
                "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
                "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
            ];
            @endphp
           
            {{ $paket_tag[$project->paket] }}</p>
            <p><strong>Nama Manager:</strong> {{ $manager->firstname.' '.$manager->lastname }}</p>
            <p><strong>Tanggal Mulai:</strong> {{ $project->start_date }}</p>
            <p><strong>Tanggal Berakhir:</strong> {{ $project->end_date }}</p>
            <p><strong>Total Dana:</strong>{{ 'Rp ' . number_format($project->tagihan, 0, ',', '.') }}</p>
            <p><strong>Total Dana:</strong>{{ 'Rp ' . number_format($tasks->sum('cost'), 0, ',', '.') }}</p>
            <p></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jenis Aktivitas</th>
                    <th>Keterangan</th>
                    <th>Biaya</th>
                </tr>
            </thead>
            <tbody>   
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-primary">{{ date('d M Y', strtotime($task->date)) }}</td>
                    <td>{{ ucwords($task->subject) }}</td>
                    <td>{{ strip_tags($task->comment) }}</td>
                    <td>{{ 'Rp. ' . number_format($task->cost, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
