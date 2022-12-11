@extends('partials/navbar')

@section('content')
    {{-- Tabs --}}
    <h1>Master Supplier</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/master/supplier/view') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/master/supplier/add') }}">Add</a>
    </nav>

    <br>
    <br>

    {{-- Isi --}}
    <div class="bg-white p-4 rounded border shadow">
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-start"></div>
                <div class="col align-self-center"></div>
                {{-- Supaya bisa di kanan --}}
                <div class="col align-self-end">
                    <form action="/master/supplier" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-bg-success" id="addon-wrapping">Search</span>
                            <input type="text" class="form-control" placeholder="By Nama" aria-label="Username" aria-describedby="addon-wrapping" name="search" value="{{ $search }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br>

        <table class="table table-striped w-100">
            <thead class="table-success text-center">
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>TELEPON</th>
                    <th>ALAMAT</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="text-center">
                            <a href="/master/supplier/detail/{{ $item->id }}"><button class="btn btn-primary">Detail</button></a>
                            <a href="/master/supplier/edit/{{ $item->id }}"><button class="btn btn-warning">Edit</button></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Tidak ada data...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
