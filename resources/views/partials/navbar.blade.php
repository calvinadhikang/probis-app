<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        #nav {
            background-color: #7FB77E;
            background-color: #70fea2;
        }

        body {
            background-color: #F7F6DC;
            background-color: rgb(236, 249, 185);
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container-fluid">
            {{-- <img src="Logo.png" width="100px" height="150px" alt="Image" class="img-fluid"> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/home')}}">Home</a>
                    </li>
                    @if (Session::get('isAdmin'))
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ url('/master/barang') }}">Master Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/master/karyawan')}}">Master Karyawan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/master/supplier')}}">Master Supplier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/master/kategori') }}">Master Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/master/merk') }}">Master Merk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/laporan') }}">Laporan</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/transaksi/penjualan') }}">Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/transaksi/pembelian') }}">Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/transaksi/retur') }}">Retur</a>
                        </li>
                    @endif
                </ul>
                <span class="navbar-text">
                    {{ Session::get('isAdmin') }}
                </span>
            </div>
        </div>
    </nav>
    <br>
    {{-- Content --}}
    <div class="container">
        @yield('header')
        <br>
        @if (Session::has('msg'))
        <div class="alert alert-{{ Session::get('type') }}" role="alert">
            {{ Session::get('msg') }}
        </div>
        @endif
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

</html>
