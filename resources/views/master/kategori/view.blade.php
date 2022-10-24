@extends('partials/navbar')

@section('header')
{{-- Tabs --}}
<h1>Master Jenis Barang</h1>
<nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
    <a class="nav-link active bg-success" href="{{ url('/master/barang/view') }}">View</a>
    <a class="nav-link text-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
        href="{{ url('/master/barang/add') }}">Add</a>
</nav>
@endsection

@section('content')
{{-- Isi  --}}
<div class="bg-white p-2 rounded">
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-start"></div>
            <div class="col align-self-center"></div>
            {{-- Supaya bisa di kanan --}}
            <div class="col align-self-end pt-4">
                <div class="input-group">
                    <span class="input-group-text text-bg-success" id="addon-wrapping">Search</span>
                    <input type="text" class="form-control" placeholder="By Nama" aria-label="Username"
                        aria-describedby="addon-wrapping">
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="p-3">
        <table class="table table-striped text-center">
            <thead class="text-bg-success">
                <tr>
                    <th>ID JENIS</th>
                    <th>NAMA JENIS</th>
                    <th>JUMLAH PRODUK DENGAN KATEGORI</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>nama</td>
                    <td>34</td>
                    <td>
                        <div class="bg-primary text-center rounded text-white p-1">Aktif</div>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">Toggle Status</a>
                    </td>
                </tr>
                <tr>
                    <td>id</td>
                    <td>nama</td>
                    <td>34</td>
                    <td>
                        <div class="bg-primary text-center rounded text-white p-1">Aktif</div>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">Toggle Status</a>
                    </td>
                </tr>
                <tr>
                    <td>id</td>
                    <td>nama</td>
                    <td>34</td>
                    <td>
                        <div class="bg-danger text-center rounded text-white p-1">Non-Aktif</div>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">Toggle Status</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Jenis Barang Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/master/kategori/add') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="nama" id="" class="form-control"
                        placeholder="Masukan Nama Kategori Baru !">
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
