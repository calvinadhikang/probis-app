@extends('partials/navbar')

@section('content')
    <h1>Detail Barang</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-bg-success active" aria-current="page" href="{{ url('/master/barang/') }}">Back</a>
    </nav>
    <br>
    <br>
    <div class="bg-white p-4 rounded border shadow">
        <h1>{{ $barang->nama }}</h1>
        <hr>
        <h3>Rp : {{ number_format($barang->harga) }}</h3>
        <div class="">
            Stok Barang : {{ $barang->stok }}<br>
            Merk : {{ $merk->nama }}<br>
            Kategori : {{ $kategori->nama }}<br>
        </div>
        <br>
        <h3>List Supplier</h3>
        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Harga Beli</th>
                <th>Action</th>
            </tr>
            <tbody>
                @forelse ($supplier as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>
                            <form action="">
                                @if ($item->harga < $barang->harga)
                                    <button class="btn btn-primary">Beli dari supplier</button>
                                @else
                                    <button class="btn btn-danger">Beli dari supplier</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
