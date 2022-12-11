@extends('/partials/navbar')

@section('content')
<h1>Detail Karyawan</h1>
<nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
    <a class="nav-link active text-bg-success" href="{{ url('/master/karyawan') }}">Back to view</a>
</nav>

<br>
<br>

<div class="bg-white border p-4 shadow rounded">
    <div class="row">
        <div class="col"><h3>Nomor ID :</h3></div>
        <div class="col"><h3>{{ $karyawan->id }}</h3></div>
    </div>
    <div class="row">
        <div class="col"><h3>Nama :</h3></div>
        <div class="col"><h3>{{ $karyawan->nama }}</h3></div>
    </div>
    <div class="row">
        <div class="col"><h3>Username :</h3></div>
        <div class="col"><h3>{{ $karyawan->username }}</h3></div>
    </div>
    <hr>
    <p>Email : {{ $karyawan->email }}</p>
    <p>No Telepon : {{ $karyawan->telepon }}</p>
    @php
        $jk = "Laki-laki";
        if ($karyawan->jenis_kelamin == 1) {
            "Perempuan";
        }

        $jabatan = "Admin";
        if ($karyawan->jabatan == 1) {
            $jabatan = "Kasir";
        }

        $status = "Aktif";
        if ($karyawan->status == 0) {
            $status = "Non-Aktif";
        }
    @endphp
    <p>Jenis Kelamin : {{ $jk }}</p>
    <p>Jabatan : {{ $jabatan }}</p>
    <p>Status : {{ $status }}</p>
</div>
@endsection
