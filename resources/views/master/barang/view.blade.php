@extends('partials/navbar')

@section('content')
    {{-- Tabs --}}
    <h1>Master Barang</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/master/barang/view') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/master/barang/add') }}">Add</a>
    </nav>

    <br>
    <br>

    {{-- Isi  --}}
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-start"></div>
            <div class="col align-self-center"></div>
            {{-- Supaya bisa di kanan --}}
            <div class="col align-self-end">
                <div class="input-group">
                    <span class="input-group-text text-bg-success" id="addon-wrapping">Search</span>
                    <input type="text" class="form-control" placeholder="By Nama" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
            </div>
        </div>
    </div>

    <br>

    <table class="table table-striped">
        <thead class="table-success">
            <tr>
                <th>ID BARANG</th>
                <th>NAMA BARANG</th>
                <th>HARGA (Rp)</th>
                <th>STOK</th>
                <th>MERK</th>
                <th>KATEGORI</th>
                <th colspan="2">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if(count($dataBarang) > 0)
                @foreach ($dataBarang as $d)
                    @php
                        use App\Models\Kategori;
                        $kategori = Kategori::find($d->kategori);
                    @endphp
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->nama}}</td>
                        <td>{{$d->harga}}</td>
                        <td>{{$d->stok}}</td>
                        <td>{{$d->merk}}</td>
                        <td>{{$kategori->nama}}</td>
                        <td><a href="{{ route('detailBarang', $d->id) }}" class="btn btn-primary">Detail</a></td>
                        <td><a href="{{ route('editBarang', $d->id)}}" class="btn btn-warning">Edit</a></td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="5"><center>Tidak ada Item.</center></td>
                    </tr>
                @endif
            </tr>
        </tbody>
    </table>
@endsection
