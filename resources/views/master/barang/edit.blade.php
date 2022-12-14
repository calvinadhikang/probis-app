@extends('partials/navbar')

@section('content')
    <h1>Detail Barang</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link text-success" aria-current="page" href="{{ url('/master/barang/') }}">View</a>
        <a class="nav-link bg-success active " href="{{ url('/master/barang/add') }}">Add</a>
    </nav>
    <br>
    <br>
    <div class="bg-white p-4 rounded">
        <form method="POST" action="/master/barang/editAction/{{ $barang->id }}">
            @csrf
            <div class="d-flex flex-wrap mb-2">
                <div class="w-100 p-2">
                    Nama Barang
                    <input type="text" class="form-control" name="nama" value="{{$barang->nama}}">
                    @error("nama")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="w-50 p-2">
                    Stok Barang
                    <input type="text" class="form-control" name="stok" value="{{$barang->stok}}">
                    @error("stok")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="w-50 p-2">
                    Harga Barang (RP)
                    <input type="text" class="form-control" name="harga" value="{{$barang->harga}}">
                    @error("harga")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="w-50 p-2">
                    Merk (hanya pilih bila mau diganti)
                    {{-- <input type="text" class="form-control" name="merk" value="{{$barang->merk}}"> --}}
                    <select name="merk" class="form-control">
                        @forelse ($merk as $item)
                        @if ($barang->merk == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endif
                        @empty

                        @endforelse
                    </select>
                    @error("merk")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="w-50 p-2">
                    Kategori (hanya pilih bila mau diganti)
                    {{-- <input type="text" class="form-control" name="merk" value="{{$barang->kategori}}"> --}}
                    <select name="kategori" class="form-control">
                        @forelse ($kategori as $item)
                        @if ($barang->kategori == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endif
                        @empty

                        @endforelse
                    </select>
                    @error("kategori")
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
