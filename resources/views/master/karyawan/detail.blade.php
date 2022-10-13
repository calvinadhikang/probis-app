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
            height: 300px;">
                <label>Username</label>
                <br>
                <h3>UsernameIvander</h3>
                <br>
                <br>

                <label>Nomor Telepon</label>
                <br>
                <h3>08999</h3>
                <br>
                <br>

                <label>Jenis Kelamin</label>
                <br>
                <h3>Pria</h3>
                <br>
                <br>

            </div>
            <div class="column" style="float: left;
            width: 50%;
            padding: 10px;
            height: 300px;">
            <label>Nama</label>
            <br>
            <h3>Ivander Berwyn</h3>
            <br>
            <br>
                <label>Jabatan</label>
                <br>
                <h3>Kasir</h3>
                <br>
                <br>

                <label>Status</label>
                <br>
                <h3>Aktif</h3>
                <br>
                <br>

            </div>
        </div>



    </form>
@endsection
