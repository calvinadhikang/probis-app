@extends('../partials/navbar')

@section('content')
    <h1>Add Penjualan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success"
        data-bs-toggle="modal" data-bs-target="#backModal"
        href="{{ url('/transaksi/penjualan') }}">Back</a>
    </nav>
    <div class="bg-white rounded p-4 my-2">
        <form action="">
            <div class="mb-2">
                Nama Customer
                <input type="text" class="form-control" name="">
            </div>
            <div class="mb-2">
                Alamat Customer
                <input type="text" class="form-control" name="">
            </div>

            <h3>Cart</h3>
            <h6>Total : 0</h6>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Barang 1</td>
                        <td>2 pcs</td>
                        <td>Rp 1000</td>
                        <td>Rp 20 000</td>
                        <td>
                            <form action="">
                                <button class="btn btn-primary">+</button>
                                <button class="btn btn-warning">-</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="bg-white rounded p-4">
        <h3>Tambah Barang</h3>
        <form action="">
            <div class="d-flex flex-wrap mb-2">
                <div class="w-75">
                    Pilih Barang...
                    <select class="form-control" name="">
                        <option value="">Barang1</option>
                        <option value="">Barang1</option>
                        <option value="">Barang1</option>
                    </select>
                </div>
                <div class="w-25">
                    Qty
                    <input type="number" class="form-control">
                </div>
            </div>
            <button class="btn btn-primary">Add</button>
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
                <a href="{{ url('/transaksi/penjualan') }}"><button type="submit" class="btn btn-danger">Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
