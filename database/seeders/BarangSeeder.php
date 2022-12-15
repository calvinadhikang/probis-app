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






        // BARANG 1
        $b = new Barang();
        $b->nama = 'Ayam Potong 2kg';
        $b->harga = 1000;
        $b->stok = 10;
        $b->merk = 2;
        $b->kategori = 2;
        $b->save();

        // // BARANG 2
        // $b = new Barang();
        // $b->nama = 'Sapi Wagyu 250gr';
        // $b->harga = 1500000;
        // $b->stok = 10;
        // $b->merk = 5;
        // $b->kategori = 2;
        // $b->save();

        // // BARANG 3
        // $b = new Barang();
        // $b->nama = 'Ayam Potong 1kg';
        // $b->harga = 14000;
        // $b->stok = 15;
        // $b->merk = 2;
        // $b->kategori = 2;
        // $b->save();

        // // BARANG 4
        // $b = new Barang();
        // $b->nama = 'Daging Kaleng 1kg';
        // $b->harga = 38000;
        // $b->stok = 12;
        // $b->merk = 5;
        // $b->kategori = 3;
        // $b->save();

        // // BARANG 5
        // $b = new Barang();
        // $b->nama = 'Sosis Ayam 1kg';
        // $b->harga = 17000;
        // $b->stok = 20;
        // $b->merk = 2;
        // $b->kategori = 3;
        // $b->save();

        // BARANG 6
        $b = new Barang();
        $b->nama = 'Sayur Bunci 500gr';
        $b->harga = 500;
        $b->stok = 15;
        $b->merk = 1;
        $b->kategori = 1;
        $b->save();

        // BARANG 7
        $b = new Barang();
        $b->nama = 'Sayur Baby Kaylan 250gr';
        $b->harga = 750;
        $b->stok = 5;
        $b->merk = 3;
        $b->kategori = 1;
        $b->save();

        Barang::factory()->count(150)->create();

        // // BARANG 8
        // $b = new Barang();
        // $b->nama = 'Sayur Kangkung 500gr';
        // $b->harga = 5000;
        // $b->stok = 8;
        // $b->merk = 7;
        // $b->kategori = 1;
        // $b->save();

        // // BARANG 9
        // $b = new Barang();
        // $b->nama = 'Sayur Bayam 500gr';
        // $b->harga = 4500;
        // $b->stok = 12;
        // $b->merk = 7;
        // $b->kategori = 1;
        // $b->save();

        // // BARANG 10
        // $b = new Barang();
        // $b->nama = 'Sayur Brokoli 250gr';
        // $b->harga = 3500;
        // $b->stok = 11;
        // $b->merk = 7;
        // $b->kategori = 1;
        // $b->save();
    }
}
