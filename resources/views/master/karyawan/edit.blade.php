@extends('partials/navbar')

@section('content')
    <h1>Edit Detail Karyawan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/karyawan/') }}">Back</a>
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
        <form action="{{ route('editkaryawan', $karyawan->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="column" style="float: left;
                width: 50%;
                padding: 10px;
                height: 500px;">

            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" value={{$karyawan->username}}>
            <br>
            <label>Nomor Telepon</label>
            <input type="text" class="form-control" name="nomortelepon" placeholder="Nomor Telepon" value={{$karyawan->telepon}}>
            <br>
            <label>Jenis Kelamin</label>
            @if($karyawan->jenis_kelamin ==0)'
            <input type="radio" name="jenis_kelamin" value=0 checked="checked"> Laki-laki<br>
            <input type="radio" name="jenis_kelamin" value=1> Perempuan<br>

            @else
            <input type="radio" name="jenis_kelamin" value=0 > Laki-laki<br>
            <input type="radio" name="jenis_kelamin" value=1 checked="checked"> Perempuan<br>
            @endif
            <br>

            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" value={{$karyawan->username}}>
            <br>

            <br>
                </div>
                <div class="column" style="float: left;
                width: 50%;
                padding: 10px;
                height: 500px;">


            <label>Jabatan</label>
            @if($karyawan->jabatan ==0)
            <input type="radio" name="jabatan" value=0 checked="checked">Admin<br>
            <input type="radio" name="jabatan" value=1 > Kasir<br>

            @else
            <input type="radio" name="jabatan" value=0 >Admin<br>
            <input type="radio" name="jabatan" value=1 checked="checked"> Kasir<br>

            @endif

            <br>

            <label>Status</label>
            @if($karyawan->status ==0)
            <input type="radio" name="status" value=0 >Dipecat<br>
            <input type="radio" name="status" value=1 checked="checked"> Aktif<br>
            @else
            <input type="radio" name="status" value=0 checked="checked">Dipecat<br>
            <input type="radio" name="status" value=1 > Aktif<br>

            @endif
            <br>

            <label class="control-label" for="oldpassword">Old Password</label>
            <div class="controls">
                <input type="password"  class="form-control" id="oldpassword" name="oldpassword" placeholder="Oldpasword"    class="input-xlarge" >
            </div>
            <span style="color: white;">{{ $errors->first('oldpassword') }}</span>
            <br>



            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password"  class="form-control" id="password" name="password" placeholder="Masukkan pasword"    class="input-xlarge" >
            </div>
            <span style="color: white;">{{ $errors->first('password') }}</span>

            <br>

            <!-- Password -->
            <label class="control-label"  for="confirm_password">Confirm password</label>
            <div class="controls">
                <input type="password"  class="form-control" id="confirm_password" name="confirm_password" placeholder="Masukin Confirm password"  class="input-xlarge" >
            </div>
            <span style="color: white;">{{ $errors->first('confirm_password') }}</span>


                </div>
            </div>



            <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
