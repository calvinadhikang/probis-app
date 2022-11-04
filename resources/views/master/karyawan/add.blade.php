@extends('partials/navbar')

@section('content')
    <h1>Master Karyawan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/karyawan/') }}">View</a>
        <a class="nav-link bg-success active " href="{{ url('/master/karyawan/add') }}">Add</a>
    </nav>
    <br>
    <br>
    <div class="bg-white p-4 rounded">
        <form action="" method="POST">
            @csrf
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Username Karyawan">
            <br>
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan">
            <br>
            <label>Password</label>
            <input type="text" class="form-control" name="pass" placeholder="Password">
            <br>
            <label>Confirm Password</label>
            <input type="text" class="form-control" name="conPass" placeholder="Confirm Password">
            <br>
            <label>No Telepon</label>
            <input type="text" class="form-control" name="notel" placeholder="No Telepon">
            <br>
            <label>Jabatan</label>
            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
            <br>
            <label>Jenis Kelamin</label>
            <input type="text" class="form-control" name="jk" placeholder="Jenis Kelamin">
            <br>
            <button class="btn btn-primary w-100" type="submit">Submit</button>
        </form>
    </div>
@endsection
