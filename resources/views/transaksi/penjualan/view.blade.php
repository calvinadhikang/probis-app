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
                    <th>Harga</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Dikang</td>
                    <td>Jalan Surabaya</td>
                    <td>1000</td>
                    <td>
                        <div class="p-2 rounded bg-success text-light text-center">Processed</div>
                    </td>
                    <td class="text-center">
                        <form action="">
                            <button class="btn btn-primary ">Detail</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
