<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    //GET
    public function View()
    {
        return view('transaksi.penjualan.view');
    }
    public function Add()
    {
        return view('transaksi.penjualan.add');
    }
}
