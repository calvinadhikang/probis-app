<?php

namespace App\Http\Controllers;

use App\Models\AsalBarang;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PembelianController extends Controller
{
    public function load(Request $request)
    {
        $supplier = Supplier::find($request->supplier);

        if ($supplier != null) {
            $barang = [];
            $list = AsalBarang::where('id_supplier','=',$supplier->id)->get();

            foreach ($list as $key => $value) {
                $b = Barang::find($value->id_barang);

                $temp = $b;
                $temp->harga = $value->harga;
                $barang[] = $temp;
            }

            Session::put('dataBarangSupp', $barang);
        }


        Session::put('supplier', $supplier);
        # code...
        return back();
    }

    //
    public function view()
    {
        return view('transaksi.pembelian.view');
        # code...
    }

    public function addview()
    {
        $supplier = Supplier::all();

        return view('transaksi.pembelian.add',[
            'supplier'=>$supplier
        ]);
    }
}
