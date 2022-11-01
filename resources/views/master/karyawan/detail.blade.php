@extends('home')

@section('content')
<header>Detail Karyawan</header>
<nav class="navbar navbar-expand-lg" id="nav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{url('/master/karyawan')}}">View</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{ url('/master/karyawan/edit') }}">Edit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Back</a>
            </li>

        </div>
    </div>

    </div>
</nav>
<div class="bg-white p-4 rounded">
    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="column" style="float: left;
            width: 50%;
            padding: 10px;
            height: 400px;">

                <label>Nama</label>
                <br>
                <h3>{{$karyawan->nama}}</h3>
                <br>
                <br>

                <label>Username</label>
                <br>
                <h3>{{$karyawan->username}}</h3>
                <br>
                <br>

                <label>Email</label>
                <br>
                <h3>{{$karyawan->email}}</h3>
                <br>
                <br>

                <label>Nomor Telepon</label>
                <br>
                <h3>{{$karyawan->telepon}}</h3>
                <br>
                <br>



            </div>
            <div class="column" style="float: left;
            width: 50%;
            padding: 10px;
            height: 400px;">
                            <label>Jenis Kelamin</label>
                            <br>
                            @if($karyawan->jenis_kelamin ==0)
                            <h3>Laki-laki</h3>
                            @else
                            <h3>Perempuan</h3>
                            @endif
                            <br>
                            <br>

                            <label>Jabatan</label>
                            <br>
                            @if($karyawan->jabatan ==0)
                            <h3>Admin</h3>
                            @else
                            <h3>Kasir</h3>
                            @endif
                            <br>
                            <br>

                            <label>Status</label>
                            <br>
                            @if($karyawan->status ==0)
                            <h3>Dipecat</h3>
                            @else
                            <h3>Aktif</h3>
                            @endif
                            <br>
                            <br>

            </div>
        </div>



    </form>
@endsection
