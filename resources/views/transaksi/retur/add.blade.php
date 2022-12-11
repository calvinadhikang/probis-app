@extends('../partials/navbar')

@section('content')
    <h1>Add Retur</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success"
        data-bs-toggle="modal" data-bs-target="#backModal"
        href="{{ url('/transaksi/retur') }}">Back</a>
    </nav>
    <br>
    <div class="bg-white rounded p-4">
        <h2 class="text-center">Detail Retur Nota {{ $data->id }}</h2>
        <hr>
        <div class="d-flex flex-wrap mb-2">
            <div class="w-50 p-2">
                Nama Customer
                <h4>{{ $data->nama }}</h4>
            </div>
            <div class="w-50 p-2">
                Alamat
                <h4>{{ $data->alamat }}</h4>
            </div>
            <div class="w-50 p-2">
                Total Harga
                <h4>{{ $data->total }}</h4>
            </div>
            <div class="w-50 p-2">
                Tanggal
                <h4>{{ $data->created_at }}</h4>
            </div>
        </div>
        <br>
        <h3>Detail Transaksi</h3>
        <form action="/transaksi/retur/create" method="POST">
            @csrf
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NAMA BARANG</th>
                        <th>HARGA (Rp)</th>
                        <th>QTY</th>
                        <th>Jumlah Di Retur</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($detail as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>
                            <input type="number" name="jumlah[]" value="0" class="form-control">
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
            <button class="btn btn-primary">Add Retur</button>
        </form>
        <br>
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
