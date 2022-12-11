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

    <div class="bg-white p-4 rounded shadow border">
        {{-- Isi  --}}
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-start"></div>
            <div class="col align-self-center"></div>
            {{-- Supaya bisa di kanan --}}
            <div class="col align-self-end">
                <form action="/master/barang" method="GET">
                    <div class="input-group">
                        <span class="input-group-text text-bg-success" id="addon-wrapping">Search</span>
                        <input type="text" class="form-control" placeholder="By Nama" aria-label="Username" aria-describedby="addon-wrapping" name="search" value="{{ $search }}">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>HARGA (Rp)</th>
                    <th>STOK</th>
                    <th>MERK</th>
                    <th>KATEGORI</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody id="list">
                @forelse ($data as $item)
                @php
                    $merk = DB::table('merks')->where('id','=', $item->merk)->first();
                    $kategori = DB::table('kategori')->where('id','=', $item->kategori)->first();
                @endphp
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>Rp {{ number_format($item->harga) }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $merk->nama }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td><a href="/master/barang/edit/{{ $item->id }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="/master/barang/detail/{{ $item->id }}" class="btn btn-primary">Detail</a></td>
                </tr>
                @empty
                <tr>
                    <th colspan="6">Data '{{ $search }}' Tidak Ada...</th>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
