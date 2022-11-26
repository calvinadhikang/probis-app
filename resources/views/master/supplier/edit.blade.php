@extends('partials/navbar')

@section('content')
<h1>Master Supplier</h1>
<nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
    <a class="nav-link bg-success active " href="{{ url('/master/supplier/') }}">Back</a>
</nav>
<br>

<div class="bg-white p-4 rounded border shadow">
    <form action="/master/supplier/edit/{{ $data->id }}" method="POST">
        <div class="row">
            <div class="column" style="width: 50%;">
                <label>Nama Supplier</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Supplier"
                    value="{{ $data->nama }}" required>
                <br>
                <label>No Telepon</label>
                <input type="number" class="form-control" name="telp" placeholder="No Telepon"
                    value="{{ $data->telepon }}" required>
                <br>
            </div>
            <div class="column" style="width: 50%;">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email Supplier"
                    value="{{ $data->email }}" required>
                <br>

                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat Supplier"
                    value="{{ $data->alamat }}" required>
                <br>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary w-100">Submit</button>
    </form>
</div>
@endsection
