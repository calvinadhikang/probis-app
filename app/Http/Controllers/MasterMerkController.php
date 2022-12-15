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

        if ($nama == "") {
            toastr()->error('Gagal Add, Nama tidak boleh kosong');
            return back();
        }

        $found = count(Merk::where('nama','=',$nama)->get());
        if ($found > 0) {
            toastr()->error('Gagal Add, Nama tidak boleh kembar');
            return back();
        }

        $obj = new Merk();
        $obj->nama = $nama;
        $obj->status = 1;
        $obj->save();

        toastr()->success('Berhasil tambah merk '.$nama);
        return redirect()->back();
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

        toastr()->success('Berhasil toggle status '.$obj->nama);
        return back();
    }
}
