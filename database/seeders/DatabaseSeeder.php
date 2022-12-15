<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\KaryawanFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KaryawanSeeder::class,
            KategoriSeeder::class,
            MerkSeeder::class,
            BarangSeeder::class,
            HtransSeeder::class,
            DtransSeeder::class
        ]);
    }
}
