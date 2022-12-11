@extends('partials/navbar')

@section('content')
<div class="border bg-white rounded shadow">
    <div class="text-center">
        <h1 class="mt-5">Generate Laporan</h1>
    </div>
    <div class="p-5">
        <form action="/laporan/create" method="POST">
            @csrf
            <h3>Masukan Informasi Laporan</h3>
            <hr>
            <label>Jenis Laporan</label>
            <select name="jenis" id="jenis-input" class="form-control" required>
                <option value="" selected disabled>Masukan Jenis Laporan</option>
                <option value="stok">Laporan Stok</option>
                <option value="penjualan">Laporan Penjualan</option>
                <option value="retur">Laporan Retur</option>
                <option value="barang">Laporan Barang</option>
            </select>

            <br>

            <div id="tgl">
                <h3>Masukan Tanggal Laporan</h3>
                <hr>
                <div class="d-flex justify-content-between">
                    <div style="width: 48%;">
                        <label for="">Dari :</label>
                        <input type="date" name="dari" id="inDari" class="form-control" >
                    </div>
                    <div style="width: 48%;">
                        <label for="">Sampai :</label>
                        <input type="date" name="sampai" id="inSampai" class="form-control" >
                    </div>
                </div>
                <br>
            </div>

            <div id="penjualan">
                <h3>Masukan Tipe Penjualan</h3>
                <hr>
                <div class="row">
                    <div class="col">
                        <label for="">Masukan Durasi Penjualan</label>
                        <select name="durasi" class="form-control">
                            <option value="hari">Hari</option>
                            <option value="bulan">Bulan</option>
                            <option value="tahun">Tahun</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Masukan Tanggal</label>
                        <input type="date" name="tgl" class="form-control">
                    </div>
                </div>
                <br>
            </div>
            <button class="btn btn-primary">Buat Laporan</button>
            <button class="btn btn-primary" name="download" value="1">Download Laporan</button>
        </form>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        let tipe = ''

        $('#tgl').hide()
        $('#penjualan').hide()

        $('#jenis-input').on('change', function() {
            tipe = this.value

            if (tipe == 'barang') {
                $('#tgl').hide()
                $('#penjualan').hide()
            } else if (tipe == 'penjualan' || tipe == 'retur'){
                $('#penjualan').show()
                $('#tgl').hide()
            } else {
                $('#tgl').hide()
                $('#penjualan').hide()
            }
        });
    })
</script>
@endsection
