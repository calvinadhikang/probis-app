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
    }

    // POST FUNCTIONS
    public function Add(Request $request)
    {
        $nama = $request->nama;

        if ($nama == "") {
            toastr()->error('Gagal Add, Nama tidak boleh kosong !');
            return redirect()->back();
        }

        $found = Kategori::where('nama','=',$nama)->get();
        if (count($found) > 0) {
            toastr()->error("Gagal Add, Nama tidak boleh kembar !");
            return redirect()->back();
        }

        $data = new Kategori();
        $data->nama = $nama;
        $data->status = 1;
        $data->save();

        toastr()->success("Berhasil Add Kategori $nama");

        return redirect()->back();
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

        toastr()->success('Berhasil ganti status '.$data->nama);
        return redirect()->back();
    }
}
