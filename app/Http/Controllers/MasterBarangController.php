<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    //
    public function ViewBarang()
    {
        return view('master.barang.view');
    }
    public function AddBarang()
    {
        return view('master.barang.add');
    }
}
