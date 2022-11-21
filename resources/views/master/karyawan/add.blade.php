@extends('partials/navbar')

@section('content')
    <h1>Master Karyawan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/karyawan/') }}">View</a>
        <a class="nav-link bg-success active " href="{{ url('/master/karyawan/add') }}">Add</a>
    </nav>
    <br>
    <div class="bg-white p-4 rounded border shadow">
        <form action="{{url('/master/karyawan/add')}}" method="POST">
            @csrf
            <h3>Informasi Login</h3>
            <hr>
            <div class="d-flex justify-content-between">
                <div class="" style="width: 45%">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username Karyawan" required>
                </div>
                <div class="" style="width: 45%">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-between">
                <div class="" style="width: 45%">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" required>
                </div>
                <div class="" style="width: 45%">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password" required>
                </div>
            </div>

            <br>
            <br>
            <h3>Kontak</h3>
            <hr>

            <div class="d-flex justify-content-between">
                <div class="" style="width: 45%">
                    <label>No Telepon  <span style="color: red">*Minimal 9</span></label>
                    <input type="tel" class="form-control" name="telp" placeholder="No Telepon" required>
                </div>
                <div class="" style="width: 45%">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>

            <br>
            <br>
            <h3>Jabatan</h3>
            <hr>

            <div class="d-flex justify-content-between">
                <div class="" style="width: 45%">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control" required>
                        <option value="" selected disabled>Pilih Jabatan</option>
                        <option value="0">Admin</option>
                        <option value="1">Kasir</option>
                    </select>
                </div>
                <div class="" style="width: 45%">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control" required>
                        <option value="" selected disabled>Pilih Gender</option>
                        <option value="1">Laki-Laki</option>
                        <option value="0">Perempuan</option>
                    </select>
                </div>
            </div>

            <br>
            <br>

            <button class="btn btn-primary w-100" type="submit">Submit</button>
        </form>
    </div>
@endsection
