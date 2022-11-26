@extends('partials/navbar')

@section('content')
<h1>Master Supplier</h1>
<nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
    <a class="nav-link text-success" aria-current="page" href="{{ url('/master/supplier/') }}">View</a>
    <a class="nav-link bg-success active " href="{{ url('/master/supplier/add') }}">Add</a>
</nav>
<br>
<br>
<div class="bg-white p-4 rounded border shadow">
    <form action="/master/supplier/add" method="POST">
        <div class="row">
            <div class="column" style="width: 50%;">
                <label>Nama Supplier</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Supplier" required>
                <br>
                <label>No Telepon</label>
                <input type="number" class="form-control" name="telp" placeholder="No Telepon" required>
                <br>
            </div>
            <div class="column" style="width: 50%;">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email Supplier" required>
                <br>

                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat Supplier" required>
                <br>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary w-100">Submit</button>
    </form>
</div>
@endsection
