@extends('partials/navbar')

@section('content')
<div class="border bg-white rounded shadow">
    <div class="text-center">
        <h1 class="mt-5">Generate Laporan</h1>
    </div>
    <div class="p-5">
        <form action="">
            <h3>Masukan Informasi Laporan</h3>
            <hr>
            <label>Jenis Laporan</label>
            <select name="" id="jenis-input" class="form-control">
                <option value="" selected disabled>Masukan Jenis Laporan</option>
                <option value="stok">Laporan Stok</option>
                <option value="penjualan">Laporan Penjualan</option>
                <option value="retur">Laporan Retur</option>
            </select>

            <br>
            <br>

            <h3>Masukan Tanggal Laporan</h3>
            <hr>
            <div class="d-flex justify-content-between" >
                <div style="width: 48%;">
                    <label for="">Dari :</label>
                    <input type="date" name="" id="" class="form-control" >
                </div>
                <div style="width: 48%;">
                    <label for="">Sampai :</label>
                    <input type="date" name="" id="" class="form-control">
                </div>
            </div>
            <br>
            <button class="btn btn-primary">Buat Laporan</button>
        </form>
    </div>
</div>
@endsection