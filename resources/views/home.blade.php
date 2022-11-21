@extends('partials/navbar')

@section('content')
    {{-- <h1>Selamat Datang</h1> --}}
    <br>
    @if (Session::get('isAdmin'))
        <h1>Overview</h1>
    @else

    @endif
    <br>
    <div class="bg-white w-100 p-4 rounded-2 shadow">
    @if (Session::get('isAdmin'))
        <div class="d-flex flex-wrap">
            <div class="bg-white p-2 border rounded m-3" style="width: 45%;">
                <div class="text-center">
                    <h3>Jumlah Karyawan</h3>
                    <img src="{{ asset('/webImages/employee.svg') }}" alt="Image" class="img-fluid" style="height: 200px;">
                </div>
                <br>
                <div class="d-flex">
                    <div class="w-50 text-center mx-3 bg-info rounded-3 text-white p-2">
                        <h4>Admin</h4>
                        <b>{{ $jmlhAdmin }}</b>
                    </div>
                    <div class="w-50 text-center mx-3 bg-warning rounded-3 text-white p-2">
                        <h4>Kasir</h4>
                        <b>{{ $jmlhKasir }}</b>
                    </div>
                </div>
            </div>
            <div class="bg-white p-2 rounded border m-3" style="width: 45%;">
                <div class="text-center">
                    <h3>Data Barang</h3>
                    <img src="{{ asset('/webImages/goods.svg') }}" alt="Image" class="img-fluid" style="height: 200px;">
                </div>
                <br>
                <div class="d-flex">
                    <div class="w-50 text-center mx-3 bg-primary rounded-3 text-white p-2">
                        <h4>Barang</h4>
                        <b>{{ $jmlhBarang }}</b>
                    </div>
                    <div class="w-50 text-center mx-3 bg-warning rounded-3 text-white p-2">
                        <h4>Kategori</h4>
                        <b>{{ $jmlhKategori }}</b>
                    </div>
                </div>
            </div>
            <div class="bg-white p-2 rounded border m-3" style="width: 100%;">
                <h1>Statistik Penjualan</h1>
            </div>
        </div>
    @else
        <div class="">
            <h1>Kerja Kerja Kerjaa...</h2>
            <a href="/transaksi/penjualan">Halaman Penjualan</a>
            <a href="/transaksi/retur">Halaman Retur</a>
        </div>
    @endif
    </div>
@endsection
