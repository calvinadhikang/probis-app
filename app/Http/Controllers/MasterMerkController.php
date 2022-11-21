<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MasterMerkController extends Controller
{
    // GET FUNCTIONS
    public function View()
    {
        $data = Merk::all();

        return view('master.merk.view', [
            'data' => $data
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
