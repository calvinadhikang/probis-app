@extends('partials/navbar')

@section('content')
    <h1>Edit Detail Karyawan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/barang/') }}">Back</a>
    </nav>
    <br>
    <br>
    <div class="container">
        <h2>Modal Example</h2>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Open modal
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                Modal body..
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

      </div>

    <div class="bg-white p-4 rounded">
        <form action="" method="POST">
            @csrf
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username">
            <br>
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan">
            <br>
            <label>Nomor Telepon</label>
            <input type="text" class="form-control" name="nomortelepon" placeholder="Nomor Telepon">
            <br>
            <label>Jabatan</label>
            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
            <br>
            <label>Jenis Kelamin</label>
            <input type="text" class="form-control" name="kelamin" placeholder="Kelamin">
            <br>
            <label>Status</label>
            <input type="text" class="form-control" name="status" placeholder="Status">
            <br>
            <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
