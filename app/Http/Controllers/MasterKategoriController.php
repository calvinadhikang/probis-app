<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\CodeCleaner\NamespaceAwarePass;

class MasterKategoriController extends Controller
{
    // GET FUNCTIONS
    public function View()
    {
        return view('master.kategori.view');
    }
    
    // POST FUNCTIONS
    public function Add(Request $request)
    {
        $nama = $request->nama;

        if ($nama == "") {
            return redirect()->back()->with("msg", "Inputan tidak boleh kosong !")->with('type', 'danger');
        }
        
        return redirect()->back()->with("msg", "Berhasil add kategori : $nama")->with('type', 'primary');
    }
}
