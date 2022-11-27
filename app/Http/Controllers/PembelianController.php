<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    //
    public function view()
    {
        return view('transaksi.pembelian.view');
        # code...
    }

    public function addview()
    {
        return view('transaksi.pembelian.add');
        # code...
    }
}
