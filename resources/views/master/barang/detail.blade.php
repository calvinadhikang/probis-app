@extends('partials/navbar')

@section('content')
    <h1>Detail Barang</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/barang/') }}">View</a>
        <a class="nav-link bg-success active " href="{{ url('/master/barang/add') }}">Add</a>
    </nav>
    <br>
    <br>
    <div class="bg-white p-4 rounded">
        <form action="" method="POST">
            @csrf
            <div class="d-flex flex-wrap mb-2">
                <div class="w-50 p-2">
                    Nama Barang
                    <h4>Dikang</h4>
                </div>
                <div class="w-50 p-2">
                    ID Barang
                    <h4>Jalan Surabaya</h4>
                </div>
                <div class="w-50 p-2">
                    Stok Barang
                    <h4>1000</h4>
                </div>
                <div class="w-50 p-2">
                    Harga Barang (RP)
                    <h4>2 April 2022</h4>
                </div>
                <div class="w-50 p-2">
                    Merk
                    <h4>2 April 2022</h4>
                </div>
                <div class="w-50 p-2">
                    Jenis
                    <h4>2 April 2022</h4>
                </div>
            </div>
        </form>
    </div>
@endsection
