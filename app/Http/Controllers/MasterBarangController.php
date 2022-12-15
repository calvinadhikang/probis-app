<?php

namespace App\Http\Controllers;

use App\Models\AsalBarang;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Supplier;
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

        if ($search != "") {
            $data = DB::table('barang')
            ->where('barang.nama', 'like', "%$search%")
            ->paginate(5);
        }else{
            $data = DB::table('barang')
            ->paginate(5);
        }

        return view('master.barang.view',[
            "data" => $data,
            'search' => $search
        ]);
    }

    public function GoAdd(){
        $supplier = Supplier::all();
        $dataMerk = Merk::where('status','=',1)->get();
        $dataKategori = Kategori::where('status','=',1)->get();

        if (count($supplier) <= 0) {
            return redirect('/master/supplier/add')->with('msg', 'Tidak ada Supplier yang terdaftar, silahkan tambah Supplier terlebih dahulu')->with('type', 'warning');
        }
        if (count($dataKategori) <= 0) {
            return redirect('/master/kategori')->with('msg', 'Tidak ada Merk Barang yang terdaftar, silahkan tambah Merk Barang terlebih dahulu')->with('type', 'warning');
        }
        if (count($dataMerk) <= 0) {
            return redirect('/master/merk')->with('msg', 'Tidak ada Merk Barang terdaftar, silahkan tambah Merk Barang terlebih dahulu')->with('type', 'warning');
        }

        return view('master.barang.add', [
            "merk" => $dataMerk,
            "kategori" => $dataKategori,
            'supplier' => $supplier
        ]);
    }

    public function Add(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'merk' => 'required',
        ]);

        //cek duplicate
        $duplicate = Barang::where('nama', '=', $request->nama)->get();
        if (count($duplicate) > 0) {
            return redirect('/master/barang')->with('msg', 'Error barang sudah ada, silahkan tambah di Menu Supplier')->with('type', 'danger');
        }

        //insert barang
        $b = new Barang();
        $b->nama = $request->nama;
        $b->harga = $request->hargajual;
        $b->stok = 0;
        $b->kategori = $request->kategori;
        $b->merk = $request->merk;
        $b->save();

        //insert asal_barang
        $asal = new AsalBarang();
        $asal->id_supplier = $request->supplier;
        $asal->id_barang = $b->id;
        $asal->harga = $request->harga;
        $asal->save();

        toastr()->success('Berhasil tambah barang'.$request->nama);
        return redirect('/master/barang');
    }

    public function formDetail(Request $request)
    {
        $barang = Barang::find($request->id);
        $merk = Merk::find($barang->merk);
        $kategori = Merk::find($barang->kategori);

        $asal = AsalBarang::where('id_barang','=',$barang->id)->get();

        $supplier = [];
        foreach ($asal as $key => $value) {
            // dd($value);
            $obj = Supplier::find($value->id_supplier);

            $temp = $obj;
            $temp->harga = $value->harga;

            $supplier[] = $obj;
        }

        // dd($supplier);

        return view('master.barang.detail', [
            "barang" => $barang,
            "merk" => $merk,
            "kategori" => $kategori,
            "supplier" => $supplier,
        ]);
    }

    public function formEdit(Request $request){
        $barang = Barang::find($request->id);
        $kategori = Kategori::all();
        $merk = Merk::all();

        return view('master.barang.edit', [
            "barang" => $barang,
            'merk' => $merk,
            'kategori' => $kategori,
        ]);
    }

    public function edit(Request $request, $id){
        $in = $request->validate([
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

        return redirect('/master/barang')->with("msg", "Berhasil edit barang!")->with('type','success');
    }

    public function getBarangJSON()
    {
        $data = Barang::all();
        return response()->json($data, 200);
    }

    public function searchBarangJSON(Request $request)
    {
        $search = $request->search;

        if ($search != "") {
            $data = DB::select("SELECT b.id as id, b.nama as nama, b.harga as harga, b.stok as stok, k.nama as kategori, m.nama as merk FROM barang b, kategori k, merks m
            WHERE b.KATEGORI = K.id
            AND b.merk = m.id
            AND b.nama LIKE '%$search%'");

        }else{
            $data = DB::select("SELECT b.id as id, b.nama as nama, b.harga as harga, b.stok as stok, k.nama as kategori, m.nama as merk FROM barang b, kategori k, merks m
            WHERE b.KATEGORI = K.id
            AND b.merk = m.id;");
        }

        return response()->json($data, 200);
    }
}
