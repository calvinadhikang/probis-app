<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class MasterBarangController extends Controller
{
    //
    public function View(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $updateIsi = DB::select("SELECT * FROM BARANG WHERE NAMA LIKE '%$search%'");
        }else{
            $updateIsi = DB::table('barang')->get();
        }
        return view('master.barang.view',["dataBarang" => $updateIsi, 'search'=>$search]);
    }

    public function GoAdd(){
        $dataMerk = Merk::all();
        $dataKategori = Kategori::all();

        return view('master.barang.add', [
            "merk" => $dataMerk,
            "kategori" => $dataKategori
        ]);
    }

    public function Add(Request $request)
    {
        $in = $request->validate([
            "nama" => ["required"],
            "harga" => ["required", "numeric"],
            "stok" => ["required", "numeric"],
            "merk" => ["required"],
            "kategori" => ["required"]
        ]);

        $result = Barang::create([
            'nama' => $in["nama"],
            'harga' => $in["harga"],
            "stok" => $in["stok"],
            "merk" => $in["merk"],
            "kategori" => $in["kategori"]
        ]);

        if ($result) {
            return redirect()->back()->with("success", "Berhasil add item!");
        }else{
            return redirect()->back()->with("error", "Gagal add item!");
        }
    }

    public function formDetail(Request $request)
    {
        $barang = Barang::find($request->id);
        $merk = Merk::find($barang->merk);
        $kategori = Merk::find($barang->kategori);
        return view('master.barang.detail', [
            "barang" => $barang,
            "merk" => $merk,
            "kategori" => $kategori,
        ]);
    }

    public function formEdit(Request $request){
        $barang = Barang::find($request->id);

        return view('master.barang.edit', [
            "barang" => $barang
        ]);
    }

    public function edit(Request $request, $id){
        $in = $request->validate([
            "id" => ["required"],
            "nama" => ["required"],
            "harga" => ["required", "numeric"],
            "stok" => ["required", "numeric"],
            "merk" => ["required"],
            "kategori" => ["required"]
        ]);

        $result = Barang::where('id', $id)->update([
            'nama' => $in["nama"],
            'harga' => $in["harga"],
            "stok" => $in["stok"],
            "merk" => $in["merk"],
            "kategori" => $in["kategori"]
        ]);
        if ($result) {
            return redirect()->back()->with("success", "Berhasil edit barang!");
        }
        else{
            return redirect()->back()->with("error", "Gagal edit barang!");
        }
    }

    public function getBarangJSON()
    {
        $data = Barang::all();
        return response()->json($data, 200);
    }
}
