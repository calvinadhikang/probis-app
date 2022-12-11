<?php

namespace Database\Seeders;

use App\Models\Htrans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HtransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // HTRANS 1
        $h = new Htrans();
        $h->nama = "Customer 1";
        $h->alamat = "Surabaya";
        $h->total = 3000;
        $h->status = 0;
        $h->save();

        // HTRANS 2
        $h = new Htrans();
        $h->nama = "Customer 2";
        $h->alamat = "Malang";
        $h->total = 1000;
        $h->status = 0;
        $h->save();

        // HTRANS3
        $h = new Htrans();
        $h->nama = "Customer 3";
        $h->alamat = "Sidoarjo";
        $h->total = 5000;
        $h->status = 0;
        $h->save();

        // HTRANS 4
        $h = new Htrans();
        $h->nama = "Customer 4";
        $h->alamat = "Trawas";
        $h->total = 2000;
        $h->status = 0;
        $h->save();

        // // HTRANS 5
        // $h = new Htrans();
        // $h->nama = "Customer 5";
        // $h->alamat = "Pandaan";
        // $h->total = 3000;
        // $h->status = 0;
        // $h->save();

        // // HTRANS 6
        // $h = new Htrans();
        // $h->nama = "Customer 6";
        // $h->alamat = "Jember";
        // $h->total = 3000;
        // $h->status = 0;
        // $h->save();

        // // HTRANS 7
        // $h = new Htrans();
        // $h->nama = "Customer 7";
        // $h->alamat = "Gresik";
        // $h->total = 3000;
        // $h->status = 0;
        // $h->save();

        // // HTRANS 8
        // $h = new Htrans();
        // $h->nama = "Customer 8";
        // $h->alamat = "Sarangan";
        // $h->total = 3000;
        // $h->status = 0;
        // $h->save();

        // // HTRANS 9
        // $h = new Htrans();
        // $h->nama = "Customer 9";
        // $h->alamat = "Mojokerto";
        // $h->total = 3000;
        // $h->status = 0;
        // $h->save();

        // // HTRANS 10
        // $h = new Htrans();
        // $h->nama = "Customer 10";
        // $h->alamat = "Banyuwangi";
        // $h->total = 3000;
        // $h->status = 0;
        // $h->save();
    }
}
