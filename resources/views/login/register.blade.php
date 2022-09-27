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
<div class="mt-5">
    <form action="{{url('/register')}}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email">
            </div>
        </div>
        <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username">
                </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="confirm-password">
            </div>
        </div>
        <div class="mb-3 row mx-2">
            <button class="btn btn-primary" type="submit">Sign Up</button>
        </div>
    </form>
</div>
@endsection