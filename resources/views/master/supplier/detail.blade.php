@extends('partials/navbar')

@section('content')
<h1>Detail Supplier</h1>
<br>
<div class="nav nav-pills nav-fill w-25 bg-white p-1 rounded float-right">
    <a class="nav-link text-success" aria-current="page" href="{{ url('/master/supplier/') }}">View</a>
    <a class="nav-link bg-success active " href="{{ url('/master/supplier/add') }}">Add</a>
</div>
<br>
<div class="bg-white p-4 rounded">
    <div class="d-flex flex-wrap">
        <div class="w-50 py-3">
            Nama Supplier
            <h3>supplierMurah</h3>
        </div>
        <div class="w-50 py-3 ">
            Email
            <h3>ibw@gmail.com</h3>
        </div>
        <div class="w-50 py-3">
            Alamat
            <h3>Jalan Surabaya</h3>
        </div>
        <div class="w-50 py-3">
            Nomor Telepon
            <h3>0822</h3>
        </div>
        <div class="w-50 py-3">
            Jenis Kelamin
            <h3>Pria</h3>
        </div>
        <div class="w-50 py-3">
            Status <br>
            <div class="btn btn-success">Aktif</div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <h1 class="font-weight-bold">Kontak Customer Service</h1>
    <hr>
    <div class="d-flex flex-wrap">
        <div class="w-50 py-3">
            Name Customer Service
            <h3>supplier Murah</h3>
        </div>
        <div class="w-50 py-3">
            Email CS
            <h3>ibw@gmail.com</h3>
        </div>
        <div class="w-50 py-3">
            Nomor Telepon CS
            <h3>0822 6767</h3>
        </div>
        <div class="w-50 py-3">
            Jabatan CS <br>
            <div class="btn btn-success">Manager Penjualan</div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <h1>List Barang Yang Di Supply</h1>
    <button class="btn btn-success">Add Barang</button>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga Jual (Rp)</th>
                <th>Merk</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">Belum ada Data</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
