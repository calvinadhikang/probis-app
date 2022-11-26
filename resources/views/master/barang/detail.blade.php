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
        <h1>{{ $barang->nama }}</h1>
        <hr>
        <h3>Rp : {{ number_format($barang->harga) }}</h3>
        <div class="">
            Stok Barang : {{ $barang->stok }}<br>
            Merk : {{ $merk->nama }}<br>
            Kategori : {{ $kategori->nama }}<br>
        </div>
        <br>
        <h3>List Supplier</h3>
        <table class="table">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
            <tbody>
                @forelse ($supplier as $item)

                @empty

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
