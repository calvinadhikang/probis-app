@extends('../partials/navbar')

@section('content')
    <h1>List Penjualan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/transaksi/penjualan') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/transaksi/penjualan/add') }}">Add</a>
    </nav>
    <br>
    <div class="bg-white border shadow p-4 rounded">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Customer</th>
                    <th>Alamat</th>
                    <th>Grand Total</th>
                    <th>Tanggal</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>Rp {{ number_format($item->total) }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if ($item->status == 0)
                                <div class="p-2 rounded bg-success text-light text-center">Penjualan</div>
                            @else
                                <div class="p-2 rounded bg-warning text-light text-center">Retur</div>
                            @endif
                        </td>
                        <td>
                            <a href="/transaksi/penjualan/detail/{{$item->id}}" class="p-2">
                                <button class="btn btn-primary">Detail</button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data transaksi...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
