<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\NamespaceAwarePass;

class MasterKategoriController extends Controller
{
    // GET FUNCTIONS
    public function View(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $data = DB::table('kategori')->where('nama', 'like', "%$search%")->paginate(5);
        }else{
            $data = DB::table('kategori')->paginate(5);
        }

        return view('master.kategori.view', [
            "data" => $data,
            'search' => $search
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
