@extends('../partials/navbar')

@section('content')
    <h1>Add Retur</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success"
        data-bs-toggle="modal" data-bs-target="#backModal"
        href="{{ url('/transaksi/retur') }}">Back</a>
    </nav>
    <div class="bg-white rounded p-4 my-2">
        <form action="">
            {{-- <div class="mb-2">
                Nama Customer
                <input type="text" class="form-control" name="">
            </div>
            <div class="mb-2">
                Alamat Customer
                <input type="text" class="form-control" name="">
            </div> --}}

            <h3>List Penjualan</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Customer</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dikang</td>
                        <td>Jalan Surabaya</td>
                        <td>1000</td>
                        <td>
                            2 April 2022
                        </td>
                        <td>
                            <form action="">
                                <button class="btn btn-primary">Tambah</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="bg-white rounded p-4">
        <h3>Detail Retur</h3>
        <div class="d-flex flex-wrap mb-2">
            <div class="w-50 p-2">
                Nama Customer
                <h4>Dikang</h4>
            </div>
            <div class="w-50 p-2">
                Alamat
                <h4>Jalan Surabaya</h4>
            </div>
            <div class="w-50 p-2">
                Total Harga
                <h4>1000</h4>
            </div>
            <div class="w-50 p-2">
                Tanggal
                <h4>2 April 2022</h4>
            </div>
        </div>
        <br>
        <h3>Detail Transaksi</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NAMA BARANG</th>
                    <th>HARGA (Rp)</th>
                    <th>QTY</th>
                    <th>MERK</th>
                    <th>JENIS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>nama</td>
                    <td>Rp 1000</td>
                    <td>10</td>
                    <td>Heize</td>
                    <td>Sabun</td>
                </tr>
                <tr>
                    <td>nama</td>
                    <td>Rp 1000</td>
                    <td>10</td>
                    <td>Heize</td>
                    <td>Sabun</td>
                </tr>
                <tr>
                    <td>nama</td>
                    <td>Rp 1000</td>
                    <td>10</td>
                    <td>Heize</td>
                    <td>Sabun</td>
                </tr>
            </tbody>
        </table>
        <br>
        <form action="">
            <button class="btn btn-primary">Add Retur</button>
        </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="backModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin Back ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Data kamu akan hilang...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ url('/transaksi/retur') }}"><button type="submit" class="btn btn-danger">Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
