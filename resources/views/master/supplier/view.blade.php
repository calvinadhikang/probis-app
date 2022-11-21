@extends('partials/navbar')

@section('content')
    {{-- Tabs --}}
    <h1>Master Supplier</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/master/supplier/view') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/master/supplier/add') }}">Add</a>
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
                <th>ID SUPPLIER</th>
                <th>NAMA SUPPLIER</th>
                <th>EMAIL</th>
                <th>NO TELEPON</th>
                <th>ALAMAT</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>ibewe thermoking</td>
                <td>ibewe@gmail.com</td>
                <td>081111111111</td>
                <td>jalan gatel no 12</td>
                <td><a href="" class="btn btn-success">Aktif</a></td>
                <td>
                    <a href="" class="btn btn-primary">Detail</a>
                    <a href="" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>ganteng thermoking</td>
                <td>ganteng@gmail.com</td>
                <td>081111111111</td>
                <td>jalan gatel no 12</td>
                <td><a href="" class="btn btn-success">Aktif</a></td>
                <td>
                    <a href="" class="btn btn-primary">Detail</a>
                    <a href="" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>banget thermoking</td>
                <td>banget@gmail.com</td>
                <td>081111111111</td>
                <td>jalan gatel no 12</td>
                <td><a href="" class="btn btn-danger">Non-Aktif</a></td>
                <td>
                    <a href="" class="btn btn-primary">Detail</a>
                    <a href="" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
