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

        $karyawan = new Karyawan;
        $karyawan->username = "karyawan";
        $karyawan->password = "karyawan";
        $karyawan->nama = "karyawan1";
        $karyawan->email = "karyawan1@gmail.com";
        $karyawan->telepon = '4564564561';
        $karyawan->jenis_kelamin = 1;
        $karyawan->jabatan = 1;
        $karyawan->status = 1;
        $karyawan->save();

        $karyawan = new Karyawan;
        $karyawan->username = "non";
        $karyawan->password = "non";
        $karyawan->nama = "karyawan12";
        $karyawan->email = "karyawan12@gmail.com";
        $karyawan->telepon = '4564564561';
        $karyawan->jenis_kelamin = 1;
        $karyawan->jabatan = 1;
        $karyawan->status = 0;
        $karyawan->save();
    }
}
