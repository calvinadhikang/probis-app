@extends('../partials/navbar')

@section('content')
    <h1>List Pembelian</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/transaksi/pembelian') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/transaksi/pembelian/add') }}">Add</a>
    </nav>
    <br>
    <div class="bg-white border shadow p-4 rounded">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                    <th>Email</th>
                    <th>Grand Total</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                @php
                    $supp = DB::select("SELECT * FROM SUPPLIER WHERE ID = $item->supplier_id")[0];
                @endphp
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $supp->nama }}</td>
                        <td>{{ $supp->email }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/transaksi/pembelian/detail/{{$item->id}}" class="p-2">
                                <button class="btn btn-primary">Detail</button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada data transaksi...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
