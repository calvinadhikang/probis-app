@extends('home')

@section('content')
    <nav class="nav nav-pills nav-fill">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/barang/view') }}">View Barang</a>
        <a class="nav-link bg-success active" href="{{ url('/master/barang/add') }}">Add Barang</a>
    </nav>

    <br>
    <br>

    <form action="" method="POST">
        @csrf
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Barang :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
    </form>
@endsection