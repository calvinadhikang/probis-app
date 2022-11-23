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
        $h = new Htrans();
        $h->nama = "Customer 1";
        $h->alamat = "Surabaya";
        $h->total = 3000;
        $h->status = 0;
        $h->save();

        $h = new Htrans();
        $h->nama = "Customer 2";
        $h->alamat = "Malang";
        $h->total = 1000;
        $h->status = 0;
        $h->save();

        $h = new Htrans();
        $h->nama = "Customer 3";
        $h->alamat = "Sidoarjo";
        $h->total = 5000;
        $h->status = 0;
        $h->save();
    }
}
