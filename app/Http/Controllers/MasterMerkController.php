<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterMerkController extends Controller
{
    // GET FUNCTIONS
    public function View()
    {
        return view('master.merk.view');
    }
    
    // POST FUNCTIONS
    public function Add(Request $request)
    {
        $nama = $request->nama;

        return redirect()->back()->with("msg", "Berhasil add merk : $nama")->with('type', 'success');
    }
}
