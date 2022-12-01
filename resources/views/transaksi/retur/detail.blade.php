@extends('../partials/navbar')

@section('content')
    <h1>Detail Retur {{$data->nama}}</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/transaksi/retur') }}">Back</a>
        {{-- <a class="nav-link text-success" href="{{ url('/transaksi/penjualan/add') }}">Add</a> --}}
    </nav>
    <br>
    <div class="bg-white border shadow p-4 rounded">
        <h3 class="text-center">Nomor Nota : {{$data->id}}</h3>
        <br>
        <h5>Nama Pembeli : {{$data->nama}}</h5>
        <h5>Alamat :</h5>
        <p>{{$data->alamat}}</p>
        <h5>Tanggal :</h5>
        <p>{{$data->created_at}}</p>
        <div class="p-2 rounded-pill text-bg-warning text-center" style="width: 15%">Retur</div>
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
                    {{-- <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($detail as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->subtotal }}</td>
                        {{-- <td>
                            @if ($item->status == 0)
                                <div class="p-2 rounded bg-warning text-light text-center">Processed</div>
                            @else
                                <div class="p-2 rounded bg-success text-light text-center">Done</div>
                            @endif
                        </td>
                        <td>
                            <a href="/transaksi/penjualan/detail/{{$item->id}}" class="p-2">
                                <button class="btn btn-primary">Detail</button>
                            </a>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada data transaksi...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <h5 class="text-end">Grand Total : {{ $data->total }}</h5>
    </div>
@endsection
