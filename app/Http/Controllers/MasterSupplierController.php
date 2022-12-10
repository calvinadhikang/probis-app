<?php

namespace App\Http\Controllers;

use App\Models\AsalBarang;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterSupplierController extends Controller
{
    public function add(Request $request)
    {
        $nama = $request->nama;
        $email = $request->email;
        $telp = $request->telp;
        $alamat = $request->nama;

        $obj = new Supplier();
        $obj->nama = $nama;
        $obj->alamat = $alamat;
        $obj->email = $email;
        $obj->telepon = $telp;
        $obj->save();

        return back()->with('msg', 'Berhasil tambah supplier')->with('type', 'success');
    }

    public function edit($id, Request $request)
    {
        $data = Supplier::find($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->telepon = $request->telp;
        $data->save();

        return redirect('master/supplier')->with('msg', "Berhasil edit supplier : $data->nama")->with('type', 'success');
    }

    public function ViewSupplier(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $data = DB::table('supplier')->where('nama','LIKE',"%$search%")->paginate(5);
        }else{
            $data = Supplier::paginate(5);
        }
        return view('master.supplier.view', [
            'data'=>$data,
            'search'=>$search
        ]);
    }
    public function AddSupplier()
    {
       return view('master.supplier.add');
    }
    public function EditSupplier($id)
    {
        $data = Supplier::find($id);
        return view('master.supplier.edit', [
            'data' => $data
        ]);
    }

    public function RemoveBarangSupplier($id, Request $request)
    {
        $barang = Barang::find($request->barang);

        DB::table('asal_barang')->where('id_barang','=',$barang->id)->where('id_supplier','=',$id)->delete();

        return back()->with('msg', "berhasil hapus barang $barang->nama")->with('type', 'success');
    }

    public function AddBarangSupplier($id, Request $request)
    {
        $supp = Supplier::find($id);
        $barang = Barang::find($request->barang);
        $harga = $request->harga;

        //check sudah ada
        $list = AsalBarang::where('id_supplier','=',$supp->id)->get();

        foreach ($list as $key => $value) {
            if ($value->id_barang == $barang->id) {
                return back()->with('msg', "barang $barang->nama sudah ada")->with('type', 'danger');
            }
        }

        $obj = new AsalBarang();
        $obj->id_barang = $barang->id;
        $obj->id_supplier = $supp->id;
        $obj->harga = $harga;
        $obj->save();

        return back()->with('msg', "berhasil tambah barang $barang->nama")->with('type', 'success');
    }
    public function EditBarangSupplier()
    {
       return view('master.editbarangsupply');
    }
    public function DetailSupplier($id)
    {
        $data = Supplier::find($id);
        $barang = Barang::all();
        $list = AsalBarang::where('id_supplier','=',$data->id)->get();
        return view('master.supplier.detail',[
            'data'=>$data,
            'barang'=>$barang,
            'list'=>$list
        ]);
    }
}
