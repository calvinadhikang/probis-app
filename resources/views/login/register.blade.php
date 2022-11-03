@extends('partials/base');

@section('content')
<div class="row my-4 ">
    <div class="col-6">
        <a href="{{url('/')}}"><button class="btn btn-outline-success w-100">Login</button></a>
    </div>
    <div class="col-6">
        <a href="{{url('/register')}}"><button class="btn btn-success w-100">Register</button></a>
    </div>
</div>
<hr>
<div class="col-md-8">
    <form action="{{url('/register')}}" method="POST">
        @csrf
        <div class="form-group mb-4">
            <input type="text" class="form-control" name="nama" placeholder="Nama">
        </div>
        <div class="form-group last mb-4">
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group last mb-4">
            <input type="text" class="form-control" name="username" placeholder="Your Username">
        </div>
        <div class="form-group last mb-4">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group last mb-4">
            <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
        </div>
        <div class="mb-3 row mx-2">
            <button class="btn btn-success" type="submit">Sign Up</button>
        </div>
    </form>
</div>
@endsection
