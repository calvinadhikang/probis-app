<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

class TransaksiPenjualanController extends Controller
{
    //GET
    public function View()
    {
        return view('transaksi.penjualan.view');
    }

    public function Add()
    {
        $data = Session::get('cart') ?? [];

        $total = 0;
        foreach ($data as $key => $value) {
            $total += $value->subtotal;
        }

        $dataBarang = Barang::all();

        return view('transaksi.penjualan.add', [
            'total' => $total,
            'data' => $data,
            'dataBarang' => $dataBarang
        ]);
    }

    public function AddAction(Request $request)
    {
        if ($request->qty <= 0) {
            return back()->with('msg', 'QTY minimal 1');
        }

        $cart = Session::get('cart');
        if ($cart == null) {
            $cart = [];

            $b = Barang::find($request->barang);

            $obj = new stdClass();
            $obj->id = $b->id;
            $obj->nama = $b->nama;
            $obj->qty = $request->qty;
            $obj->harga = $b->harga;
            $obj->subtotal = $request->qty * $b->harga;

            $cart[] = $obj;
            Session::put('cart' , $cart);
        }else{
            $idx = -1;
            foreach ($cart as $key => $value) {
                if ($request->barang == $value->id) {
                    $idx = $key;
                }
            }

            $obj = $cart[$idx];
            $obj->qty = $obj->qty + $request->qty;
            $obj->subtotal = $obj->qty * $obj->harga;
            Session::put('cart' , $cart);
        }

        return back();
    }

    public function kurang(Request $request)
    {
        $cart = Session::get('cart');
        $idx = -1;
        foreach ($cart as $key => $value) {
            if ($request->id == $value->id) {
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
        Session::put('cart' , $cart);

        return back();
    }

    public function tambah(Request $request)
    {
        dd("tambah");
        $cart = Session::get('cart');

        $idx = -1;
        foreach ($cart as $key => $value) {
            if ($request->id == $value->id) {
                $idx = $key;
            }
        }

        $obj = $cart[$idx];
        $obj->qty = $obj->qty + 1;
        $obj->subtotal = $obj->qty * $obj->harga;
        Session::put('cart' , $cart);

        // return back();
    }

    public function checkout(Request $request)
    {
        if (Session::get('cart') == null) {
            return back();
        }

        $nama = $request->nama;
        $alamat = $request->alamat;

        if ($alamat == "" || $nama == "") {
            return back();
        }

        DB::beginTransaction();

        try {
            //INSERT HEADER
            DB::insert('insert into htrans (id, name) values (?, ?)', [1, 'Dayle']);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
