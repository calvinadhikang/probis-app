@extends('partials/navbar')

@section('content')
<h1>Edit Detail Karyawan</h1>
<nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
    <a class="nav-link bg-success active" aria-current="page" href="{{ url('/master/karyawan/') }}">Back</a>
</nav>
<br>
<br>
<div class="bg-white p-4 rounded border shadow">
    <form action="{{ route('editkaryawan', $karyawan->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="column" style="float: left;
                width: 50%;
                padding: 10px;
                height: 500px;">

                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username"
                    value={{$karyawan->username}}>
                <span style="color: red;">{{ $errors->first('username') }}</span>

                <br>
                <label>Nomor Telepon</label>
                <input type="text" class="form-control" name="telepon" placeholder="Nomor Telepon"
                    value={{$karyawan->telepon}}>
                <span style="color: red;">{{ $errors->first('telepon') }}</span>

                <br>

                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" value={{$karyawan->email}}>
                <span style="color: red;">{{ $errors->first('email') }}</span>

                <br>
                <label>Jenis Kelamin</label>
                <br>

                @if($karyawan->jenis_kelamin ==0)
                <input type="radio" name="jenis_kelamin" value=0 checked="checked"> Laki-laki<br>
                <input type="radio" name="jenis_kelamin" value=1> Perempuan<br>

                @else
                <input type="radio" name="jenis_kelamin" value=0> Laki-laki<br>
                <input type="radio" name="jenis_kelamin" value=1 checked="checked"> Perempuan<br>
                @endif
                <span style="color: red;">{{ $errors->first('jenis_kelamin') }}</span>

                <br>

                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan"
                    value={{$karyawan->username}}>
                <br>
                <span style="color: red;">{{ $errors->first('nama') }}</span>

                <br>
            </div>
            <div class="column" style="float: left;
                width: 50%;
                padding: 10px;
                height: 500px;">


                <label>Jabatan</label>
                <br>
                @if($karyawan->jabatan ==0)
                <input type="radio" name="jabatan" value=0 checked="checked">Admin<br>
                <input type="radio" name="jabatan" value=1> Kasir<br>

                @else
                <input type="radio" name="jabatan" value=0>Admin<br>
                <input type="radio" name="jabatan" value=1 checked="checked"> Kasir<br>

                @endif
                <span style="color: red;">{{ $errors->first('jabatan') }}</span>

                <br>

                <label>Status</label>
                <br>
                @if($karyawan->status ==0)
                <input type="radio" name="status" value=0 checked="checked">Dipecat<br>
                <input type="radio" name="status" value=1> Aktif<br>
                @else
                <input type="radio" name="status" value=0>Dipecat<br>
                <input type="radio" name="status" value=1 checked="checked"> Aktif<br>

                @endif
                <span style="color: red;">{{ $errors->first('status') }}</span>

                <br>

                <label class="control-label" for="oldpassword">Old Password</label>
                <div class="controls">
                    <input type="password" class="form-control" id="oldpassword" name="oldpassword"
                        placeholder="Oldpasword" class="input-xlarge">
                </div>
                <span style="color: red;">{{ $errors->first('oldpassword') }}</span>
                <br>



                <!-- Password-->
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan pasword" class="input-xlarge">
                </div>
                <span style="color: red;">{{ $errors->first('password') }}</span>

                <br>

                <!-- Password -->
                <label class="control-label" for="confirm_password">Confirm password</label>
                <div class="controls">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        placeholder="Masukin Confirm password" class="input-xlarge">
                </div>
                <span style="color: red;">{{ $errors->first('confirm_password') }}</span>


            </div>
        </div>



        <button class="btn btn-primary w-100">Submit</button>
    </form>
</div>
@endsection
