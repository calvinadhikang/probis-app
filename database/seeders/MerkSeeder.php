<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // MERK 1
        $m = new Merk();
        $m->nama = 'Wings Food';
        $m->status = 1;
        $m->save();

        // MERK 2
        $m = new Merk();
        $m->nama = 'Japfa Chicken';
        $m->status = 1;
        $m->save();

        // MERK 3
        $m = new Merk();
        $m->nama = 'Unilever';
        $m->status = 1;
        $m->save();

        // MERK 4
        $m = new Merk();
        $m->nama = 'Tiga Pilar Sejahtera';
        $m->status = 1;
        $m->save();

        // MERK 5
        $m = new Merk();
        $m->nama = 'Estika Tata Tiara';
        $m->status = 1;
        $m->save();

        // MERK 6
        $m = new Merk();
        $m->nama = 'Formosa Ingridient';
        $m->status = 1;
        $m->save();

        // MERK 7
        $m = new Merk();
        $m->nama = 'Segar Kumala';
        $m->status = 1;
        $m->save();

        Merk::factory()->count(75)->create();
    }
}
