@extends('partials/navbar')

@section('content')
    <h1>Master Barang</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/barang/') }}">View</a>
        <a class="nav-link bg-success active " href="{{ url('/master/barang/add') }}">Add</a>
    </nav>
    <br>
    <br>
    <div class="bg-white p-4 rounded shadow border">
        <form method="POST">
            @csrf
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Barang">
            @error("nama")
                <small style="color:red">{{$message}}</small>
            @enderror
            <br>
            <div class="d-flex justify-content-between">
                <div class="" style="width: 45%">
                    <label>Harga Barang (Rp)</label>
                    <input type="number" class="form-control" name="harga" placeholder="Harga Barang">
                    @error("harga")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="" style="width: 45%">
                    <label>Stok</label>
                    <input type="number" class="form-control" name="stok" placeholder="Jumlah Stok">
                    @error("stok")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-between">
                <div class="" style="width: 45%">
                    <label>Merk</label>
                    @error("merk")
                    <small style="color:red">{{$message}}</small>
                    @enderror
                    <select name="merk" class="form-control" id="" required>
                        <option value="" selected disabled>Pilih Merk</option>
                        @forelse ($merk as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="" style="width: 45%">
                    <label>Kategori</label>
                    @error("kategori")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                    <select name="kategori" id="" class="form-control" required>
                        <option value="" selected disabled>Pilih Kategori</option>
                        @forelse ($kategori as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @empty

                        @endforelse
                    </select>
                    {{-- <input type="text" class="form-control" name="kategori" placeholder="Pilih Jenis..."> --}}
                </div>
            </div>
            {{-- <input type="text" class="form-control" name="merk" placeholder="Pilih Merk..."> --}}
            <br>
            <br>
            <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
