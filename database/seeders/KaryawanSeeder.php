<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $karyawan = new Karyawan;
        $karyawan->username = "admin";
        $karyawan->password = "admin";
        $karyawan->nama = "admin1";
        $karyawan->email = "admin1@gmail.com";
        $karyawan->telepon = '1231231231';
        $karyawan->jenis_kelamin = 1;
        $karyawan->jabatan = 0;
        $karyawan->status = 1;
        $karyawan->save();

        Karyawan::factory()->count(50)->create();
    }
}
