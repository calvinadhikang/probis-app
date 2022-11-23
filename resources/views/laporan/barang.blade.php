<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        #nav {
            background-color: #7FB77E;
            background-color: #70fea2;
        }

        body {
            background-color: #F7F6DC;
            background-color: rgb(236, 249, 185);
        }

    </style>
</head>

<body class="bg-white">
    <div class="container">
        <div class="text-center">
            <h1>Laporan Barang</h1>
            <h4>Periode : {{$dari}} - {{$sampai}}</h4>
            <hr>
            <br>
            <h3>Top 5 Barang Best Seller</h3>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Total Pembelian</th>
                    <th>Total Profit</th>
                </tr>
                @forelse ($dataTop as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>{{$item->total}}</td>
                    </tr>
                @empty

                @endforelse
            </table>
            <br>
            <h3>List Barang</h3>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Merk</th>
                    <th>Kategori</th>
                </tr>
                @forelse ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->stok}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{ App\Models\Merk::find($item->merk)->nama}}</td>
                    <td>{{ App\Models\Kategori::find($item->kategori)->nama }}</td>
                </tr>
                @empty

                @endforelse
            </table>
        </div>
    </div>
</body>

</html>
