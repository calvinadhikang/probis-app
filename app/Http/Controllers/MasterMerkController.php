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
        $key = $request->search;
        if ($key) {
            $data = DB::table('merks')->where('nama', 'like', "%$key%")->paginate(5);
        }else{
            $data = DB::table('merks')->paginate(5);
        }

        return view('master.merk.view', [
            'data' => $data,
            'search' => $key
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
