<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $m = new Merk();
        $m->nama = 'Wings Food';
        $m->status = 1;
        $m->save();
        $m = new Merk();
        $m->nama = 'Japfa Chicken';
        $m->status = 1;
        $m->save();
        $m = new Merk();
        $m->nama = 'Unilever';
        $m->status = 1;
        $m->save();

        

        $b = new Barang();
        $b->nama = 'Ayam Potong 2kg';
        $b->harga = 1000;
        $b->stok = 10;
        $b->merk = 2;
        $b->kategori = 2;
        $b->save();
        $b = new Barang();
        $b->nama = 'Sayur Bunci 500gr';
        $b->harga = 500;
        $b->stok = 15;
        $b->merk = 1;
        $b->kategori = 1;
        $b->save();
        $b = new Barang();
        $b->nama = 'Sayur Baby Kaylan 250gr';
        $b->harga = 750;
        $b->stok = 5;
        $b->merk = 3;
        $b->kategori = 1;
        $b->save();
    }
}
