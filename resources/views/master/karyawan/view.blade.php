@extends('partials/navbar')

@section('content')
    {{-- Tabs --}}
    <h1>Master Karyawan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/master/karyawan/view') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/master/karyawan/add') }}">Add</a>
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
        <thead class="text-bg-success">
            <tr>
                <th>ID KARYAWAN</th>
                <th>NAMA KARYAWAN</th>
                <th>NAMA KARYAWAN</th>
                <th>NAMA KARYAWAN</th>
                <th>NO TELEPON</th>
                <th>JABATAN</th>
                <th>DETAIL</th>
                <th>EDIT</th>

            </tr>
        </thead>
<<<<<<< HEAD
        <tbody>
            @if(count($dataKaryawan) > 0)
            @foreach ($dataKaryawan as $d)
                <tr>
                    <td>{{$d->id_karyawan}}</td>
                    <td>{{$d->username_karyawan}}</td>
                    <td>{{$d->nama_karyawan}}</td>
                    <td>{{$d->password_karyawan}}</td>
                    <td>{{$d->notel_karyawan}}</td>
                    <td>{{$d->jabatan_karyawan}}</td>
                    <td>{{$d->jk_karyawan}}</td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5"><center>Tidak ada Karyawan.</center></td>
            </tr>
            @endif
        </tbody>
=======

        @forelse ($karyawans as $karyawan)




                    <tr>
                        <td>{{ $karyawan->id }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->telepon }}</td>
                        @if($karyawan->jabatan ==0)
                            <td>Admin</td>
                        @else
                            <td>Kasir</td>
                        @endif
                        <td><a href="{{ route('detailkaryawan', $karyawan->id) }}" class="btn btn-primary">Detail</a></td>
                        <td><a href="{{ route('editkaryawan', $karyawan->id) }}" class="btn btn-warning">Edit</a></td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada Data !</td>
                    </tr>
                @endforelse

>>>>>>> 673161f2688f413f970d6413cd335ba320b56a3c
    </table>
@endsection
