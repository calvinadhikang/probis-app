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
        <form action="{{url('/master/karyawan/add')}}" method="POST">
            @csrf
            <label>Username</label>
            <input type="text" class="form-control" name="usernama" placeholder="Username Karyawan">
            <span style="color: red;">{{ $errors->first('usernama') }}</span>

            <br>
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan">
            <span style="color: red;">{{ $errors->first('nama') }}</span>

            <br>
            <label>Password</label>
            <input type="text" class="form-control" name="password" placeholder="Password">
            <span style="color: red;">{{ $errors->first('password') }}</span>

            <br>
            <label>Confirm Password</label>
            <input type="text" class="form-control" name="conpassword" placeholder="Confirm Password">
            <span style="color: red;">{{ $errors->first('conpassword') }}</span>

            <br>
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email">
            <span style="color: red;">{{ $errors->first('email') }}</span>

            <br>
            <label>No Telepon</label>
            <input type="text" class="form-control" name="telepon" placeholder="No Telepon">
            <span style="color: red;">{{ $errors->first('telepon') }}</span>

            <br>
            <label>Jabatan</label>
            <br>
            <input type="radio" name="jabatan" value=0 > Admin<br>
            <input type="radio" name="jabatan" value=1> Kasir<br>
            <br>
            <label>Jenis Kelamin</label>
            <br>
            <input type="radio" name="jenis_kelamin" value=0 > Laki-laki<br>
            <input type="radio" name="jenis_kelamin" value=1> Perempuan<br>

            <br>
            <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
