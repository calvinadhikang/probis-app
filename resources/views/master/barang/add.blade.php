@extends('partials/navbar')

@section('content')
    <h1>Master Barang</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/barang/') }}">View</a>
        <a class="nav-link bg-success active " href="{{ url('/master/barang/add') }}">Add</a>
    </nav>
    <br>
    <br>
    <div class="bg-white p-4 rounded">
        <form action="" method="POST">
            @csrf
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Barang">
            <br>
            <label>Harga Barang (Rp)</label>
            <input type="text" class="form-control" name="harga" placeholder="Harga Barang">
            <br>
            <label>Merk</label>
            <input type="text" class="form-control" name="merk" placeholder="Pilih Merk...">
            <br>
            <label>Jenis</label>
            <input type="text" class="form-control" name="jenis" placeholder="Pilih Jenis...">
            <br>
            <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection