@extends('../partials/navbar')

@section('content')
    <h1>List Retur</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/transaksi/retur') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/transaksi/retur/pilih') }}">Add</a>
    </nav>
    <br>
    <div class="bg-white p-4 rounded border shadow">
        <h3>Transaksi Retur</h3>
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
                @forelse ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>Rp {{ number_format($item->total) }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <form action="/transaksi/retur/detail/{{ $item->id }}" method="GET">
                            <button class="btn btn-primary">Detail</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Belum ada transaksi..</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
