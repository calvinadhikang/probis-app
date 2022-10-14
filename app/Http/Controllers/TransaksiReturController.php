<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiReturController extends Controller
{
    //GET
    public function View()
    {
        return view('transaksi.retur.view');
    }
    public function Add()
    {
        return view('transaksi.retur.add');
    }
}
