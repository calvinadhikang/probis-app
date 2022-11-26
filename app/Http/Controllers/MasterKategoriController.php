<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Psy\CodeCleaner\NamespaceAwarePass;

class MasterKategoriController extends Controller
{
    // GET FUNCTIONS
    public function View()
    {
        $data = Kategori::all();

        return view('master.kategori.view', [
            "data" => $data
        ]);
    }

    public function getKategoriJSON()
    {
        $data = Kategori::all();
        return response()->json($data, 200);
        # code...
    }

    // POST FUNCTIONS
    public function Add(Request $request)
    {
        $nama = $request->nama;

        if ($nama == "") {
            return redirect()->back()->with("msg", "Inputan tidak boleh kosong !")->with('type', 'danger');
        }

        $data = new Kategori();
        $data->nama = $nama;
        $data->status = 1;
        $data->save();

        return redirect()->back()->with("msg", "Berhasil add kategori : $nama")->with('type', 'primary');
    }

    public function Toggle(Request $request)
    {
        $data = Kategori::find($request->id);
        if ($data->status == "1") {
            $data->status = 0;
        }else{
            $data->status = 1;
        }
        $data->save();

        return redirect()->back()->with("msg", "Berhasil update kategori : $data->nama")->with('type', 'primary');
    }
}
