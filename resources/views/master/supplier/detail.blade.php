@extends('partials/navbar')

@section('content')
<h1>Detail Supplier</h1>
<br>
<div class="nav nav-pills nav-fill w-25 bg-white p-1 rounded float-right">
    <a class="nav-link bg-success active " href="{{ url('/master/supplier') }}">Back</a>
</div>
<br>
<div class="bg-white p-4 rounded border shadow">
    <div class="text-center">
        <h1>{{ $data->nama }}</h1>
    </div>
    <hr>
    <div class="d-flex flex-wrap">
        <div class="w-100 py-3">
            Email
            <h3 class="text-wrap">{{ $data->email }}</h3>
        </div>
        <div class="w-50 py-3">
            Alamat
            <h3>{{ $data->alamat }}</h3>
        </div>
        <div class="w-50 py-3">
            Nomor Telepon
            <h3>{{ $data->telepon }}</h3>
        </div>
    </div>
    {{-- <h1 class="font-weight-bold">Kontak Customer Service</h1>
    <hr>
    <div class="d-flex flex-wrap">
        <div class="w-50 py-3">
            Name Customer Service
            <h3>supplier Murah</h3>
        </div>
        <div class="w-50 py-3">
            Email CS
            <h3>ibw@gmail.com</h3>
        </div>
        <div class="w-50 py-3">
            Nomor Telepon CS
            <h3>0822 6767</h3>
        </div>
        <div class="w-50 py-3">
            Jabatan CS <br>
            <div class="btn btn-success">Manager Penjualan</div>
        </div>
    </div> --}}
    <br>
    <div class="d-flex justify-contetn-between">
        <h4 class="w-75">List Barang Yang Di Supply</h4>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Barang</button>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Merk</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($list as $item)
                @php
                    $b = DB::select('select * from barang where id = ?', [$item->id_barang])[0];
                    $kategori = DB::table('kategori')->where('id', '=', $b->kategori)->first();
                    $merk = DB::table('merks')->where('id', '=', $b->merk)->first();
                @endphp
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>Rp {{ number_format($b->harga) }}</td>
                    <td>Rp {{ number_format($item->harga) }}</td>
                    <td>{{ $merk->nama }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <form action="/master/supplier/removeBarang/{{ $data->id }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" name="barang" value="{{ $b->id }}">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url("/master/supplier/addBarang/".$data->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="">Nama Barang</label>
                    <select name="barang" class="form-control">
                        @forelse ($barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @empty

                        @endforelse
                    </select>
                    <br>
                    <label for="">Masukan harga beli barang</label>
                    <input type="number" name="harga" placeholder="Harga beli barang.." class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
