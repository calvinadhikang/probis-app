<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
    <style>
        table, tr, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body class="bg-white">
    <div class="p-4">
        <div class="text-center">
            <h1>Laporan Penjualan per-{{ $durasi }}</h1>
            <h4>Periode : {{$tgl}}</h4>
            <hr>
            <br>
            <h3>Data Penjualan {{ $tgl }}</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nomor Nota</th>
                        <th>Nama Customer</th>
                        <th>Alamat</th>
                        <th>Grand Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>Rp {{ number_format($item->total) }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada data...</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            @php
                $total = 0;
                foreach ($data as $key => $value) {
                    $total += $value->total;
                }
            @endphp
            <h5 class="text-end">Total Pendapatan : Rp {{ number_format($total) }}</h5>
        </div>
    </div>
</body>
</html>
