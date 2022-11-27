<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterMerkController extends Controller
{
    // GET FUNCTIONS
    public function View(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $data = DB::select("SELECT * FROM MERKS WHERE NAMA LIKE '%$search%'");
        }else{
            $data = Merk::all();
        }

        return view('master.merk.view', [
            'data' => $data,
            'search' => $search
        ]);
    }

    // POST FUNCTIONS
    public function Add(Request $request)
    {
        $nama = $request->nama;

        $obj = new Merk();
        $obj->nama = $nama;
        $obj->status = 1;
        $obj->save();

        return redirect()->back()->with("msg", "Berhasil add merk : $nama")->with('type', 'success');
    }

    public function Toggle(Request $request)
    {
        $id = $request->input('id');

        $obj = Merk::find($id);
        if ($obj->status == 1) {
            $obj->status = 0;
        }else{
            $obj->status = 1;
        }
        $obj->save();

        return back()->with('msg', 'Berhasil Toggle Status')->with('type', 'success');
    }
}
