@extends('../partials/navbar')

@section('content')
    <h1>Detail Pembelian {{$supplier->nama}}</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/transaksi/pembelian') }}">Back</a>
        {{-- <a class="nav-link text-success" href="{{ url('/transaksi/penjualan/add') }}">Add</a> --}}
    </nav>
    <br>
    <div class="bg-white border shadow p-4 rounded">
        <h3 class="text-center">Nomor Nota : {{$data->id}}</h3>
        <br>
        <h5>Nama Supplier : {{$supplier->nama}}</h5>
        <h5>Alamat :</h5>
        <p>{{$supplier->alamat}}</p>
        <h5>Email :</h5>
        <p>{{$supplier->email}}</p>
        <h5>Tanggal :</h5>
        <p>{{$supplier->created_at}}</p>
        <hr>
        <h5>Detail Nota</h5>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty Barang</th>
                    <th>Harga Barang</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detail as $item)
                @php
                    $b = DB::select("SELECT * FROM BARANG WHERE ID = $item->barang_id")[0];
                @endphp
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp {{ number_format($item->harga) }}</td>
                        <td>Rp {{ number_format($item->subtotal) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada data transaksi...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <h5 class="text-end">Grand Total : Rp {{ number_format($data->total) }}</h5>
    </div>
@endsection
