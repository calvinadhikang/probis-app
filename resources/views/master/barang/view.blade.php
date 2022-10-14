@extends('partials/navbar')

@section('content')
    {{-- Tabs --}}
    <h1>Master Barang</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/master/barang/view') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/master/barang/add') }}">Add</a>
    </nav>

    <br>
    <br>

    {{-- Isi  --}}
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-start"></div>
            <div class="col align-self-center"></div>
            {{-- Supaya bisa di kanan --}}
            <div class="col align-self-end">
                <div class="input-group">
                    <span class="input-group-text text-bg-success" id="addon-wrapping">Search</span>
                    <input type="text" class="form-control" placeholder="By Nama" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
            </div>
        </div>
    </div>

    <br>

    <table class="table table-striped">
        <thead class="text-bg-success">
            <tr>
                <th>ID BARANG</th>
                <th>NAMA BARANG</th>
                <th>HARGA (Rp)</th>
                <th>STOK</th>
                <th>MERK</th>
                <th>JENIS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>nama</td>
                <td>Rp 1000</td>
                <td>10</td>
                <td>Heize</td>
                <td>Sabun</td>
                <td>
                    <a href="{{ url('/master/barang/detail') }}" class="btn btn-primary">Detail</a>
                    <a href="" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <tr>
                <td>id</td>
                <td>nama</td>
                <td>Rp 1000</td>
                <td>10</td>
                <td>Heize</td>
                <td>Sabun</td>
                <td>
                    <a href="{{ url('/master/barang/detail') }}" class="btn btn-primary">Detail</a>
                    <a href="" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <tr>
                <td>id</td>
                <td>nama</td>
                <td>Rp 1000</td>
                <td>10</td>
                <td>Heize</td>
                <td>Sabun</td>
                <td>
                    <a href="{{ url('/master/barang/detail') }}" class="btn btn-primary">Detail</a>
                    <a href="" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
