@extends('../partials/navbar')

@section('content')
    <h1>Tambah Transaksi Penjualan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success"
        data-bs-toggle="modal" data-bs-target="#backModal"
        href="{{ url('/transaksi/penjualan') }}">Back</a>
    </nav>
    <br>
    <div class="bg-white rounded p-4 my-2 shadow">
        <form action="/transaksi/penjualan/checkout" method="POST">
            @csrf
            <div class="mb-2">
                Nama Customer
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-2">
                Alamat Customer
                <input type="text" class="form-control" name="alamat">
            </div>

            <h3>Cart</h3>
            <h6>Total : Rp {{ $total }}</h6>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp {{ number_format($item->harga) }}</td>
                            <td>Rp {{ number_format($item->subtotal) }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    {{-- <form action="/transaksi/penjualan/tambah" method="POST">
                                        @csrf
                                        <button class="btn btn-primary text-center" style="width: 50px;" type="submit">+</button>
                                    </form> --}}
                                    <a href="/transaksi/penjualan/tambah/{{ $item->id }}">
                                        <div class="btn btn-primary text-center" style="width: 50px;">+</div>
                                    </a>
                                    <a href="/transaksi/penjualan/kurang/{{ $item->id }}">
                                        <div class="btn btn-danger text-center" style="width: 50px;">-</div>
                                    </a>
                                    {{-- <form action="/transaksi/penjualan/kurang" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-danger text-center" style="width: 50px;">-</button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Belum ada barang di keranjang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            <button class="btn btn-primary">Checkout</button>
        </form>
    </div>
    <br>
    <div class="bg-white rounded p-4 shadow">
        <h3>Tambah Barang</h3>
        <form action="/transaksi/penjualan/add" method="POST">
            @csrf
            <div class="d-flex flex-wrap mb-2 justify-content-between">
                <div class="" style="width: 70%;">
                    Pilih Barang...
                    <select class="form-control" name="barang" required>
                        @forelse ($dataBarang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }} - Rp {{ $item->harga }}</option>
                        @empty
                            <option value="" selected disabled>Belum ada barang...</option>
                        @endforelse
                    </select>
                </div>
                <div class="w-25">
                    Qty
                    <input type="number" value="0" name="qty"  class="form-control" required>
                </div>
            </div>
            <button class="btn btn-primary">Tambah Ke Keranjang</button>
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
