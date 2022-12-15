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
    <div class="p-4">
        <div class="text-center">
            <h1>Laporan Stok Barang</h1>
            <h4>Periode : {{$tgl}}</h4>
            <div class="text-end">
                <a href="/laporan" class="btn btn-danger">Kembali</a>
            </div>
            <hr>

            <h3 class="text-start">List Barang</h3>
            <div class="d-flex">
                <div class="rounded-pill text-bg-danger p-2 m-2" style="width: 15%">Stok < 10</div>
                <div class="rounded-pill text-bg-warning p-2 m-2" style="width: 15%">Stok < 50</div>
                <div class="rounded-pill border text-bg-white p-2 m-2" style="width: 15%">Stok > 50</div>
            </div>
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
                @php
                    $color = "";
                    if ($item->stok < 10) {
                        $color = "table-danger";
                    }
                    else if ($item->stok < 50) {
                        $color = "table-warning";
                    }
                @endphp
                <tr class="{{ $color }}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->stok}}</td>
                    <td>Rp {{number_format($item->harga)}}</td>
                    <td>{{ App\Models\Merk::find($item->merk)->nama}}</td>
                    <td>{{ App\Models\Kategori::find($item->kategori)->nama }}</td>
                </tr>
                @empty

                @endforelse
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script>
    $(document).ready(function(){
        getTop5Barang();
    })

    function getTop5Barang(){
        $.ajax({
            type: 'GET',
            url: '/barang/top5',
            success: function(data){
                generateChart(data);
            }
        })
    }

    function generateChart(res){
        arrLabel = []
        arrData = []
        console.log(res)
        res.forEach(element => {
            arrLabel.push(element.nama)
            arrData.push(element.total)
        });

        const labels = arrLabel;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan',
                data: arrData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        new Chart($('#top5'), config);
    }
</script>
</html>
