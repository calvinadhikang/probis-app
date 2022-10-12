@extends('partials/base');

@section('content')
<div class="col-md-8">
    <div class="mb-4">
    <h3>Sign In</h3>
  </div>
  <form action="{{url('/')}}" method="POST">
    @csrf
    <div class="form-group first">
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" required placeholder="Username">
        </div>
    </div>
    <br>
    <div class="form-group last mb-4">
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" required placeholder="Password">
        </div>
    </div>

    <div class="d-flex mb-5 align-items-center">
        <button class="btn btn-primary" type="submit">Sign In</button>
    </div>
  </form>
  <a href="{{url('/')}}"><button class="btn btn-success w-100">Login</button></a>
  <br>
  <br>
  <a href="{{url('/register')}}"><button class="btn btn-outline-success w-100">Register</button></a>
</div>
@endsection
