<?php

namespace Database\Seeders;

use App\Models\Dtrans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DtransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DTRANS 1
        $d = new Dtrans();
        $d->htrans_id = 1;
        $d->barang_id = 1;
        $d->nama = "Ayam Potong 2kg";
        $d->qty = 2;
        $d->harga = 1000;
        $d->subtotal = 2000;
        $d->save();

        // DTRANS 2
        $d = new Dtrans();
        $d->htrans_id = 1;
        $d->barang_id = 2;
        $d->nama = "Sayur Buncis 500gr";
        $d->qty = 2;
        $d->harga = 500;
        $d->subtotal = 1000;
        $d->save();

        // DTRANS 3
        $d = new Dtrans();
        $d->htrans_id = 2;
        $d->barang_id = 1;
        $d->nama = "Ayam Potong 2kg";
        $d->qty = 1;
        $d->harga = 1000;
        $d->subtotal = 1000;
        $d->save();

        // DTRANS 4
        $d = new Dtrans();
        $d->htrans_id = 3;
        $d->barang_id = 2;
        $d->nama = "Sayur Buncis 500gr";
        $d->qty = 10;
        $d->harga = 500;
        $d->subtotal = 5000;
        $d->save();

        Dtrans::factory()->count(600)->create();
    }
}
