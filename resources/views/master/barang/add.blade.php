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
        @error("harga")
            <small style="color:red">{{$message}}</small> <br>
        @enderror
        @error("nama")
            <small style="color:red">{{$message}}</small> <br>
        @enderror
        @error("merk")
            <small style="color:red">{{$message}}</small> <br>
        @enderror
        @error("kategori")
            <small style="color:red">{{$message}}</small> <br>
        @enderror
        <form method="POST" action="{{ url('/master/barang/addBarang') }}">
            @csrf
            <div class="">
                <h5>Pilih Supplier</h5>
                <select name="supplier" id="supplier-input" class="form-control">
                    <option value="0" selected disabled>Pilih Supplier</option>
                    @forelse ($supplier as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @empty

                    @endforelse
                </select>
                <hr>
            </div>
            <br>
            <div id="barang-input">
                <h5>Masukan Data Barang</h5>
                <div class="d-flex justify-content-between">
                    <div class="" style="width: 45%">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Barang">

                    </div>
                    <div class="" style="width: 45%">
                        <label>Harga <b>BELI</b> Barang (Rp)</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga Barang" value="0">

                    </div>

                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div class="" style="width: 45%">
                        <label>Merk</label>

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

                        <select name="kategori" id="" class="form-control" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            @forelse ($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <br>
                <div class="w-50">
                    <label class="text-warning"><b>Optional Harga Jual</b></label>
                    <input type="number" name="hargajual" class="form-control" value="0">
                </div>
                <br>
                <button class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
<script>
$(document).ready(function(){
    $('#barang-input').hide();

    $('#supplier-input').on('change', function() {
        tipe = this.value

        if (tipe == 0) {
            $('#barang-input').hide();
        }else{
            $('#barang-input').show();
        }
    });
});
</script>
@endsection
