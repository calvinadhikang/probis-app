@extends('partials/navbar')

@section('content')
@if (Session::get('isAdmin'))
<h1>Dashboard</h1>
@else

@endif
<div class="bg-white w-100 p-4 rounded-2 shadow">
    @if (Session::get('isAdmin'))
        <div class="d-flex flex-wrap justify-content-between">
            <div class="bg-white p-2 border rounded" style="width: 45%;">
                <div class="text-center">
                    <h3>Jumlah Karyawan</h3>
                    <img src="{{ asset('/webImages/employee.svg') }}" alt="Image" class="img-fluid" style="height: 200px;">
                </div>
                <br>
                <div class="d-flex">
                    <div class="w-50 text-center mx-3 bg-info rounded-3 text-white p-2">
                        <h4>Jumlah Admin</h4>
                        <b>{{ $jmlhAdmin }}</b>
                    </div>
                    <div class="w-50 text-center mx-3 bg-warning rounded-3 text-white p-2">
                        <h4>Jumlah Kasir</h4>
                        <b>{{ $jmlhKasir }}</b>
                    </div>
                </div>
            </div>
            <div class="bg-white p-2 rounded border" style="width: 45%;">
                <div class="text-center">
                    <h3>Data Barang</h3>
                    <img src="{{ asset('/webImages/goods.svg') }}" alt="Image" class="img-fluid" style="height: 200px;">
                </div>
                <br>
                <div class="d-flex">
                    <div class="w-50 text-center mx-3 bg-primary rounded-3 text-white p-2">
                        <h4>Jumlah Barang</h4>
                        <b id="countBarang">{{ $jmlhBarang }}</b>
                    </div>
                    <div class="w-50 text-center mx-3 bg-warning rounded-3 text-white p-2">
                        <h4>Jumlah Kategori</h4>
                        <b id="countKategori">{{ $jmlhKategori }}</b>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="bg-white p-4 rounded border w-100">
            <h1>Statistik Pendapatan</h1>
            <canvas class="w-100" id="statistikPenjualan"></canvas>
        </div>
    @else
        <div class="">
            <h1>Kerja Kerja Kerjaa...</h2>
                <a href="/transaksi/penjualan">Halaman Penjualan</a>
                <a href="/transaksi/retur">Halaman Retur</a>
        </div>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'GET',
            url: '/getBarang',
            success: function(data){
                $('#countBarang').html(data.length)
            }
        });

        $.ajax({
            type: 'GET',
            url: '/getKategori',
            success: function(data){
                $('#countKategori').html(data.length)
            }
        });

        getPenjualanPerBulan();
    })

    function generateLineChart(result){
        var month= ["January","February","March","April","May","June","July","August","September","October","November","December"];
        var year = new Date().getFullYear();

        var monthShow = [];
        var dataShow = [];

        result.forEach(element => {
            monthShow.push(month[element.month-1]);
            dataShow.push(element.total);
        });

        const data = {
            labels: monthShow,
            datasets: [{
                label: 'Pendapatan Per Tahun ' + year,
                data: dataShow,
                fill: true,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };

        new Chart($('#statistikPenjualan'), config);
    }

    function getPenjualanPerBulan(){
        $.ajax({
            type: 'GET',
            url : '/penjualanPerBulan',
            success : function(data){
                generateLineChart(data);
            }
        })
    }
</script>
@endsection
