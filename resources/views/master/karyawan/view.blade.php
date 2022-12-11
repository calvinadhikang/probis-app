@extends('partials/navbar')

@section('content')
    {{-- Tabs --}}
    <h1>Master Karyawan</h1>
    <nav class="nav nav-pills nav-fill w-25 bg-white p-1 rounded">
        <a class="nav-link active bg-success" href="{{ url('/master/karyawan') }}">View</a>
        <a class="nav-link text-success" href="{{ url('/master/karyawan/add') }}">Add</a>
    </nav>

    <br>
    <br>

    <div class="bg-white border p-4 shadow rounded">
        {{-- Isi  --}}
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-start"></div>
                <div class="col align-self-center"></div>
                {{-- Supaya bisa di kanan --}}
                <div class="col align-self-end">
                    <form action="/master/karyawan">
                        <div class="input-group">
                            <span class="input-group-text text-bg-success" id="addon-wrapping">Search</span>
                            <input type="text" class="form-control" placeholder="By Nama" aria-label="Username" name="search" value="{{ $search }}" aria-describedby="addon-wrapping">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>NO TELEPON</th>
                        <th>JABATAN</th>
                        <th colspan="2">ACTION</th>
                    </tr>
                </thead>
                <tbody id="list">
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->telepon }}</td>
                        @if ($item->jabatan == 0)
                            <td>
                                <div class="p-2 text-bg-primary text-center rounded">
                                    Admin
                                </div>
                            </td>
                        @else
                        <td>
                            <div class="p-2 text-bg-warning text-center rounded">
                                Kasir
                            </div>
                        </td>
                        @endif
                        <td>
                            <a class="btn btn-outline-primary" href="{{ url('master/karyawan/detail/'.$item->id) }}">Detail Karyawan</a>
                        </td>
                        <td>
                            <a class="btn btn-outline-warning" href="{{ url('master/karyawan/edit/'.$item->id) }}">Edit Karyawan</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="6">Data '{{ $search }}' Tidak Ada...</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
@endsection
