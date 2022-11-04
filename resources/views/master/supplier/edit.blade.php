@extends('partials/navbar')

@section('content')
    <h1>Master Supplier</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/supplier/') }}">View</a>
        <a class="nav-link bg-success active " href="{{ url('/master/supplier/add') }}">Add</a>
    </nav>
    <br>
    <br>
    <a class="btn btn-success" href="{{ url('/master/supplier/') }}">Back</a>

    <div class="bg-white p-4 rounded">
        <form action="" method="POST">
            <div class="row">
                <div class="column" style="background-color:float: left;
                width: 50%;">
                  <label>Nama Supplier</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Supplier">
                  <br>
                  <label>No Telepon</label>
                <input type="text" class="form-control" name="merk" placeholder="No Telepon">
                <br>
                </div>
                <div class="column" style="background-color:float: left;
                width: 50%;">
                  <label>Email</label>
                  <input type="text" class="form-control" name="harga" placeholder="Email Supplier">
                  <br>

                  <label>Alamat</label>
                  <input type="text" class="form-control" name="jenis" placeholder="Alamat Supplier">
                  <br>
                </div>
              </div>
              </div>
            @csrf


            <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
