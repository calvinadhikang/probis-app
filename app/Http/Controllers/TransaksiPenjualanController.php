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
    public function detail($id)
    {
        $data = DB::select("SELECT * FROM HTRANS WHERE id = $id LIMIT 1")[0];
        $detail = DB::select("SELECT * FROM DTRANS WHERE htrans_id = $data->id");
        # code...
        return view('transaksi.penjualan.detail', [
            "data" => $data,
            "detail" => $detail
        ]);
    }

    public function View()
    {
        $data = DB::select('SELECT * FROM HTRANS');

        return view('transaksi.penjualan.view', [
            "data" => $data
        ]);
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

            if ($idx == -1) {
                # kalau barang belum ada
                $b = Barang::find($request->barang);

                $obj = new stdClass();
                $obj->id = $b->id;
                $obj->nama = $b->nama;
                $obj->qty = $request->qty;
                $obj->harga = $b->harga;
                $obj->subtotal = $request->qty * $b->harga;

                $cart[] = $obj;
            }else{
                # kalau barang sudah ada
                $obj = $cart[$idx];
                $obj->qty = $obj->qty + $request->qty;
                $obj->subtotal = $obj->qty * $obj->harga;
            }
            Session::put('cart' , $cart);
        }

        return back();
    }

    public function kurang($id)
    {
        $cart = Session::get('cart');
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
        Session::put('cart' , $cart);

        return back();
    }

    public function tambah($id)
    {
        // dd("tambah");
        $cart = Session::get('cart');

        $idx = -1;
        foreach ($cart as $key => $value) {
            if ($id == $value->id) {
                $idx = $key;
            }
        }

        $obj = $cart[$idx];
        $obj->qty = $obj->qty + 1;
        $obj->subtotal = $obj->qty * $obj->harga;
        Session::put('cart' , $cart);

        return back();
    }

    public function checkout(Request $request)
    {
        $cart = Session::get('cart');
        if ($cart == null) {
            return back()->with('msg', 'Keranjang tidak boleh kosong')->with('type', 'danger');
        }

        $nama = $request->nama;
        $alamat = $request->alamat;

        if ($alamat == "" || $nama == "") {
            return back();
        }

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($cart as $key => $value) {
                $total += $value->subtotal;
            }

            //INSERT HEADER
            DB::insert("insert into htrans (nama, alamat, total, status) values ('$nama', '$alamat', $total, 0)");

            $lastId = DB::getPdo()->lastInsertId();
            foreach ($cart as $key => $value) {
                # code...
                DB::insert("insert into dtrans (htrans_id, barang_id, nama, qty, harga, subtotal) values ($lastId, $value->id, '$value->nama', $value->qty, $value->harga, $value->subtotal)");
            }

            DB::commit();

            Session::put('Cart', null);
            return redirect('/transaksi/penjualan')->with('msg', 'Berhasil Checkout')->with('type', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('msg', 'Gagal Checkout')->with('type', 'warning');
        }
    }

    public function getPenjualanPerBulan()
    {
        //ini untuk ngambil data per tahun
        $date = date('Y');
        $data = DB::select("SELECT MONTH(created_at) AS month, SUM(total) AS total FROM Htrans WHERE YEAR(created_at) = $date GROUP BY YEAR(created_at), MONTH(created_at) ASC");

        // ini untuk ngambil data semua tahun
        // $data = DB::select("SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, SUM(total) AS total FROM Htrans GROUP BY YEAR(created_at), MONTH(created_at)");

        return response()->json($data, 200);
    }
}
