<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $k = new Kategori();
        $k->nama = 'Sayuran';
        $k->status = 1;
        $k->save();
        $k = new Kategori();
        $k->nama = 'Daging Mentah';
        $k->status = 1;
        $k->save();
        $k = new Kategori();
        $k->nama = 'Daging Olahan';
        $k->status = 1;
        $k->save();
    }
}
