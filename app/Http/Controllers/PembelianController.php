<?php

namespace App\Http\Controllers;

use App\Models\AsalBarang;
use App\Models\Barang;
use App\Models\HPembelian;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

class PembelianController extends Controller
{
    public function detail($id)
    {
        $data = HPembelian::find($id);
        $supplier = Supplier::find($data->supplier_id);
        $detail = DB::select("SELECT * FROM DPEMBELIAN WHERE DPEMBELIAN_ID = $data->id");
        // dd($detail);

        return view('transaksi.pembelian.detail', [
            'data' => $data,
            'supplier' => $supplier,
            'detail' => $detail
        ]);
    }

    public function checkout(Request $request)
    {
        # code...
        $cart = Session::get('cartPembelian');
        if ($cart == null) {
            return back()->with('msg', 'Keranjang tidak boleh kosong')->with('type', 'danger');
        }

        $supplier = Session::get('supplier');

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($cart as $key => $value) {
                $total += $value->subtotal;
            }

            $time = date('Y-m-d H:i:s');

            //INSERT HEADER
            $lastId = DB::table('hpembelian')->insertGetId(array(
                'supplier_id' => $supplier->id,
                'total' => $total,
                'created_at' => $time,
                'updated_at' => $time,
            ));
            // DB::insert("insert into hpembelian (supplier_id, total) values ('$supplier->id', $total)");

            // $lastId = DB::getPdo()->lastInsertId();
            foreach ($cart as $key => $value) {
                # code...
                DB::table('dpembelian')->insert(array(
                    'dpembelian_id' => $lastId,
                    'barang_id' => $value->id,
                    'qty' => $value->qty,
                    'harga' => $value->harga,
                    'subtotal' => $value->subtotal,
                    'created_at' => $time,
                    'updated_at' => $time,
                ));

                $addStok = Barang::find($value->id);
                $addStok->stok = $addStok->stok + $value->qty;
                $addStok->save();

                // DB::insert("insert into dpembelian (dpembelian_id, barang_id , qty, subtotal) values ($lastId, $value->id, $value->qty, $value->subtotal)");
            }

            DB::commit();

            Session::put('cart', null);
            return redirect('/transaksi/pembelian')->with('msg', 'Berhasil Checkout')->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('msg', 'Gagal Checkout'.$e->getMessage())->with('type', 'warning');
        }
    }

    public function add(Request $request)
    {
        $id = $request->barang;
        $qty = $request->qty;
        $supplier = Session::get('supplier');

        $b = Barang::find($request->barang);
        $harga = DB::select("SELECT harga FROM ASAL_BARANG WHERE ID_BARANG = $id AND ID_SUPPLIER = $supplier->id")[0]->harga;

        //to cart
        if ($request->qty <= 0) {
            return back()->with('msg', 'QTY minimal 1')->with('type', 'danger');
        }

        $cart = Session::get('cartPembelian');
        if ($cart == null) {
            $cart = [];

            $obj = new stdClass();
            $obj->id = $b->id;
            $obj->nama = $b->nama;
            $obj->qty = $request->qty;
            $obj->harga = $harga;
            $obj->subtotal = $request->qty * $harga;

            $cart[] = $obj;
            Session::put('cartPembelian' , $cart);
        }else{
            $idx = -1;
            foreach ($cart as $key => $value) {
                if ($request->barang == $value->id) {
                    $idx = $key;
                }
            }

            if ($idx == -1) {
                # kalau barang belum ada

                $obj = new stdClass();
                $obj->id = $b->id;
                $obj->nama = $b->nama;
                $obj->qty = $request->qty;
                $obj->harga = $harga;
                $obj->subtotal = $request->qty * $harga;

                $cart[] = $obj;
            }else{
                # kalau barang sudah ada
                $obj = $cart[$idx];
                $obj->qty = $obj->qty + $request->qty;
                $obj->subtotal = $obj->qty * $obj->harga;
            }
            Session::put('cartPembelian' , $cart);
        }

        return back();
    }

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
        Session::forget('cartPembelian');
        # code...
        return back();
    }

    //
    public function view()
    {
        $data = HPembelian::all();
        return view('transaksi.pembelian.view',[
            'data' => $data
        ]);
        # code...
    }

    public function addview()
    {
        $supplier = Supplier::all();
        $data = Session::get('cartPembelian') ?? [];
        // dd($data);

        return view('transaksi.pembelian.add',[
            'supplier'=>$supplier,
            'data' => $data
        ]);
    }

    public function kurang($id)
    {
        $cart = Session::get('cartPembelian');
        $idx = -1;
        foreach ($cart as $key => $value) {
            if ($id == $value->id) {
                $idx = $key;
            }
        }

        $obj = $cart[$idx];
        $obj->qty = $obj->qty - 1;
        if ($obj->qty <= 0) {
            unset($cart[$idx]);
        }else{
            $obj->subtotal = $obj->qty * $obj->harga;
        }
        Session::put('cartPembelian' , $cart);

        return back();
    }

    public function tambah($id)
    {
        // dd("tambah");
        $cart = Session::get('cartPembelian');

        $idx = -1;
        foreach ($cart as $key => $value) {
            if ($id == $value->id) {
                $idx = $key;
            }
        }

        $obj = $cart[$idx];
        $obj->qty = $obj->qty + 1;
        $obj->subtotal = $obj->qty * $obj->harga;
        Session::put('cartPembelian' , $cart);

        return back();
    }
}
