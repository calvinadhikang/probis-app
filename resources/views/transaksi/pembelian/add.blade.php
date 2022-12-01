@extends('../partials/navbar')

@section('content')
    <h1>Tambah Transaksi Pembelian</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success"
        data-bs-toggle="modal" data-bs-target="#backModal"
        href="{{ url('/transaksi/pembelian') }}">Back</a>
    </nav>
    <br>
    <div class="bg-white rounded p-4 my-2 shadow">
        <form action="load" method="POST">
            @csrf
            <div class="row">
                <div class="col-10">
                    <select name="supplier" class="form-control">
                        @if (!Session::has('supplier'))
                            <option value="" selected disabled>Pilih Supplier</option>
                        @else
                            <option value="" selected disabled>Kosongi Supplier Sekarang</option>
                        @endif



                        @forelse ($supplier as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="col">
                    @if (!Session::has('supplier'))
                        <button class="btn btn-primary w-100">Load Data</button>
                    @else
                        <button class="btn btn-danger w-100">Load Data Baru</button>
                    @endif
                </div>
            </div>
            @if (Session::has('supplier'))
                <span class="text-danger">Pilih ulang supplier dengan memilih supplier baru / pilih 'Kosongi supplier sekarang' untuk memilih ulang supplier <br> lalu tekan tombol <b>'Load Data baru'</b></span>
            @endif
        </form>
        <hr>
        @if (!Session::has('supplier'))
            <h1 class="text-center">Pilih supplier dulu, lalu klik tombol <br><span class="text-primary">'Load Data'</span> diatas</h1>
        @else
            @php
                $supp = Session::get('supplier');
                $total = 0;
            @endphp
            @if (Session::has('cartPembelian'))
                @php
                    foreach (Session::get('cartPembelian') as $key => $value) {
                        $total += $value->subtotal;
                    }
                @endphp
            @endif
            <h1>Memilih dari supplier : {{ $supp->nama }}</h1>
            <br>
            <h3>Cart</h3>
            <h6>Total : Rp {{ number_format($total) }}</h6>

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
                                <a href="/transaksi/pembelian/tambah/{{ $item->id }}">
                                    <div class="btn btn-primary text-center" style="width: 50px;">+</div>
                                </a>
                                <a href="/transaksi/pembelian/kurang/{{ $item->id }}">
                                    <div class="btn btn-danger text-center" style="width: 50px;">-</div>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Belum ada data..</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            <form action="/transaksi/pembelian/checkout" method="GET">
                @csrf
                <button class="btn btn-primary">Checkout</button>
            </form>
        @endif
    </div>
    <br>

    @if (Session::has('supplier'))
    <div class="bg-white rounded p-4 shadow">
        <h3>Tambah Barang</h3>
        <form action="/transaksi/pembelian/add" method="POST">
            @csrf
            <div class="d-flex flex-wrap mb-2 justify-content-between">
                <div class="" style="width: 70%;">
                    Pilih Barang...
                    <select class="form-control" name="barang" required>
                        @php
                            $dataBarang = Session::get('dataBarangSupp')
                        @endphp
                        @forelse ($dataBarang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }} - Rp {{ number_format($item->harga) }}</option>
                        @empty

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
    @endif



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
                <a href="{{ url('/transaksi/pembelian') }}"><button type="submit" class="btn btn-danger">Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
