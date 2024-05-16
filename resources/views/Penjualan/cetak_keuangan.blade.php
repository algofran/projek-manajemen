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
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>LAPORAN PENJUALAN</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pembeli</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>   
                @foreach($sales as $data)
                <tr>
                  <td>{{ $data->tgl }}</td>
                  <td>{{ ucwords($data->pembeli) }}</td>
                  <td>{{ $data->keterangan }}</td>
                  <td>Rp. {{ number_format($data->jual, 0, ',', '.') }}</td>
                  <td>
                    @php
                    $bayar = $pay[$data->status];
                    @endphp
                    @switch($bayar)
                        @case('Belum Terbayar')
                            <span> {{ $bayar }}</span>
                            @break
                        @case('Sudah Terbayar')
                            <span>{{ $bayar }}</span>
                            @break                                         
                        @default
                            <!-- Tindakan jika tidak ada kasus yang cocok -->
                    @endswitch
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
