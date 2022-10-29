<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function homePage()
    {
        if (Session::get('isAdmin')) {
            $jmlhAdmin = DB::table('karyawan')->where('jabatan','=','0')->count();
            $jmlhKasir = DB::table('karyawan')->where('jabatan','=','1')->count();
            $jmlhBarang = DB::table('barang')->count();
            $jmlhKategori = DB::table('kategori')->count();

            return view('home', [
                "jmlhAdmin" => $jmlhAdmin,
                "jmlhKasir" => $jmlhKasir,
                "jmlhBarang" => $jmlhBarang,
                "jmlhKategori" => $jmlhKategori,
            ]);
        }

        return view('home');
    }

}
